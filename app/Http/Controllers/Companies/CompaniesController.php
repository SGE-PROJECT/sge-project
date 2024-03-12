<?php

namespace App\Http\Controllers\Companies;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\management\Company_image;
use App\Models\management\Affiliated_companie;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Affiliated_companie::with('companiesImage')->get();
        return view("management.companies.companies", compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.companies.add-companies');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'company_name' => 'required',
        'address' => 'required',
        'contact_name' => 'required',
        'contact_email' => 'required|email',
        'contact_phone' => 'required',
        'description' => 'required',
        'affiliation_date' => 'required|date_format:Y-m-d',
        'image' => 'image|mimes:jpeg,png,jpg,gif',
    ]);

    // Verificar si el nombre de la empresa es igual a "ErrorCompany"
    if ($request->company_name == 'ErrorCompany') {
        throw new \Exception('Error al agregar la empresa');
    }

    $company = new Affiliated_companie();
    $company->company_name = $request->company_name;
    $company->address = $request->address;
    $company->contact_name = $request->contact_name;
    $company->contact_email = $request->contact_email;
    $company->contact_phone = $request->contact_phone;
    $company->description = $request->description;
    $company->affiliation_date = $request->affiliation_date;
    $company->save();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();

        $image->move(public_path('images/companies'), $imageName);
        $companyImage = new Company_Image();
        $companyImage->affiliated_companie_id = $company->id;
        $companyImage->image_path = 'images/companies/' . $imageName;
        $companyImage->save();
    }

    return redirect()->route('empresas.index')->with('success', 'Company created successfully!');
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'description' => 'required',
            'affiliation_date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $company = Affiliated_companie::findOrFail($id);
        $company->update($validatedData);

        $this->processImage($request, $company);

        return redirect()->route('empresas.index')->with('success', 'Company updated successfully!');
    }
    public function destroy(string $id): RedirectResponse
    {

        $company = Affiliated_companie::findOrFail($id);


        if ($company->companiesImage) {
            $company->companiesImage->delete();
        }

        $company->delete();
        return redirect()->route('empresas.index')->with('success', 'Company deleted successfully!');
    }

}

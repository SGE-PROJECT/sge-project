<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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

            $company->companiesImage()->create(['image_path' => 'images/companies' . $imageName]);
        }

        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
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

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

  
}

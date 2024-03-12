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
        $validatedData = $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'description' => 'required',
            'affiliation_date' => 'required|date_format:Y-m-d',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $company = Affiliated_companie::create($validatedData);

        $this->processImage($request, $company);

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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company = Affiliated_companie::findOrFail($id);
        $company->update($validatedData);

        $this->processImage($request, $company);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    /**
     * Process the uploaded image.
     */
    private function processImage(Request $request, Affiliated_companie $company)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('images/companies', $imageName, 'public');

            $companyImage = $company->companiesImage ?: new Company_image();
            $companyImage->affiliated_companie_id = $company->id;
            $companyImage->image_path = 'images/companies/' . $imageName;
            $companyImage->save();
        }
    }
}

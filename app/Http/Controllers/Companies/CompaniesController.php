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
    public function __construct(){
        $this->middleware("can:empresas.index")->only('index');
        $this->middleware("can:empresas.edit")->only('edit', 'update');
        $this->middleware("can:empresas.create")->only('create', 'store');
        $this->middleware("can:empresas.destroy")->only('destroy');
        $this->middleware("can:empresas.showTable")->only('showTable');
        $this->middleware("can:empresas.activate")->only('activate');
    }

    public function index()
    {
        // Solo selecciona las empresas que estén activas
        $companies = Affiliated_companie::with('companiesImage')->get();
        return view("management.companies.companies", compact('companies'));
    }

    public function create()
    {
        return view('management.companies.add-companies');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => ['required', 'regex:/^(?![\s\S]0[\s\S]$)[\s\S]*$/'],
            'address' => ['required', 'regex:/^(?!\s+$)[\s\S]*$/'], // No permitir solo espacios en blanco
            'contact_name' => ['required', 'regex:/^(?![\d\s]+$)[\w\d\s]+$/'], // No permitir números ni espacios
            'contact_email' => 'required|email',
            'contact_phone' => ['required', 'regex:/^\d{10,}$/'], // Asumiendo que el número de teléfono debe tener al menos 10 dígitos
            'description' => ['required', 'regex:/^(?!\s+$)[\s\S]*$/'], // No permitir solo espacios en blanco
            'affiliation_date' => 'required|date_format:Y-m-d',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

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
        $company->affiliation_date = Carbon::parse($request->affiliation_date)->toDateString();
        $company->is_active = true; // Por defecto, una nueva empresa se establece como activa
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

        return redirect()->route('empresas.index')->with('success', '¡Empresa creada exitosamente!');
    }

    public function edit(string $id)
    {
        $company = Affiliated_companie::findOrFail($id);
        return view('management.companies.edit-companies', compact('company'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => ['required', 'regex:/^(?![\s\S]0[\s\S]$)[\s\S]*$/'],
            'address' => ['required', 'regex:/^(?!\s+$)[\s\S]*$/'], // No permitir solo espacios en blanco
            'contact_name' => ['required', 'regex:/^(?![\d\s]+$)[\w\d\s]+$/'], // No permitir números ni espacios
            'contact_email' => 'required|email',
            'contact_phone' => ['required', 'regex:/^\d{10,}$/'], // Asumiendo que el número de teléfono debe tener al menos 10 dígitos
            'description' => ['required', 'regex:/^(?!\s+$)[\s\S]*$/'], // No permitir solo espacios en blanco
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $company = Affiliated_companie::findOrFail($id);
        $company->company_name = $request->company_name;
        $company->address = $request->address;
        $company->contact_name = $request->contact_name;
        $company->contact_email = $request->contact_email;
        $company->contact_phone = $request->contact_phone;
        $company->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            $image->move(public_path('images/companies'), $imageName);
            $companyImage = new Company_Image();
            $companyImage->affiliated_companie_id = $company->id;
            $companyImage->image_path = 'images/companies/' . $imageName;
            $companyImage->save();
        }

        $company->save();

        return redirect()->route('empresas.index')->with('success', '¡Empresa actualizada exitosamente!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $company = Affiliated_companie::findOrFail($id);
        $company->is_active = false; // Cambiar el estado de la empresa a inactivo en lugar de eliminarla
        $company->save();

        return redirect()->route('empresas.index')->with('success', '¡Empresa eliminada exitosamente!');
    }

    public function showTable()
    {
        // Solo selecciona las empresas que estén activas
        $companies = Affiliated_companie::with('companiesImage')->where('is_active', true)->get();
        return view("management.companies.companiesforUsers", compact('companies'));
    }
    public function activate(string $id): RedirectResponse
    {
        $company = Affiliated_companie::findOrFail($id);
        $company->is_active = true;
        $company->save();

        return redirect()->route('empresas.index')->with('success', '¡Empresa activada exitosamente!');
    }
}


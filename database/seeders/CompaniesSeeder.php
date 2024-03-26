<?php

namespace Database\Seeders;

use App\Models\management\Affiliated_companie;
use App\Models\management\Company_image;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'Dotnet',
                'address' => 'Calle 123, Ciudad X',
                'contact_name' => 'Juan Pérez',
                'contact_email' => 'dotnet@dotnet.com',
                'contact_phone' => '123456789',
                'description' => 'Software',
                'affiliation_date' => '2022-01-01',
            ],
            [
                'company_name' => 'Go1',
                'address' => 'Avenida 456, Ciudad Y',
                'contact_name' => 'María García',
                'contact_email' => 'go1@go1.com',
                'contact_phone' => '987654321',
                'description' => 'Software',
                'affiliation_date' => '2022-02-01',
            ],
            // Puedes agregar más datos de prueba aquí si es necesario
        ];
        foreach ($companies as $companyData) {
            $company = Affiliated_companie::create([
                'company_name' => $companyData['company_name'],
                'address' => $companyData['address'],
                'contact_name' => $companyData['contact_name'],
                'contact_email' => $companyData['contact_email'],
                'contact_phone' => $companyData['contact_phone'],
                'description' => $companyData['description'],
                'affiliation_date' => Carbon::parse($companyData['affiliation_date'])->toDateString(),
            ]);

            // Datos de prueba para las imágenes de las empresas
            $imageData = [
                'affiliated_companie_id' => $company->id,
                'image_path' => 'images/companies/'. $company->company_name . '.jpg', // Aquí se usa el nombre de la empresa como parte del nombre del archivo de imagen
            ];

            // Crear la imagen asociada a la empresa
            Company_image::create($imageData);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\management\Division;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MasiveAddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('users.masiveadd', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        $path = $request->file('file')->getRealPath();
        $spreadsheet = IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->getRowIterator(2) as $row) { // Suponemos que la primera fila contiene los encabezados
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Recorrer todas las celdas, incluso si no están establecidas
            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            // Buscar la división por nombre
            $division = Division::where('name', $rowData[2])->first();
            if (!$division) {
                continue; // Si la división no existe, saltar esta fila o manejar el error según sea necesario
            }

            $user = User::create([
                'name' => $rowData[0],
                'email' => $rowData[1],
                'division_id' => $division->id, // Usar el ID de la división encontrada
                'password' => Hash::make($rowData[3]),
            ]);

            // Asignar roles utilizando Spatie
            if (isset($rowData[4])) { // Asumiendo que el nombre del rol está en la quinta columna
                $role = Role::where('name', $rowData[4])->first();
                if ($role) {
                    $user->assignRole($role);
                }
            }
        }

        return back()->with('success', 'Usuarios importados correctamente');
    }

    public function export(): StreamedResponse
    {
        $fileName = 'demo.xlsx';

        // Preparar la respuesta de descarga usando una respuesta stream de Laravel
        return response()->streamDownload(function () use ($fileName) {
            // Limpiar (y desactivar) el buffer de salida antes de enviar el archivo
            if (ob_get_contents()) ob_end_clean();

            // Inicialización del objeto Spreadsheet y preparación del archivo
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Demo');

            // Configurar el escritor de PhpSpreadsheet y guardar la salida
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $fileName, ['Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']);
    }

}

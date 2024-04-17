<?php

namespace App\Http\Controllers;

use App\Exports\UsersDivisionExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminDivisionExportController extends Controller
{
        public function exportExcelD()
        {
            return Excel::download(new UsersDivisionExport, 'usuariosDivision.xlsx');
        }
}

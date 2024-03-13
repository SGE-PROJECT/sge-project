<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersTest; // Asegúrate de importar el modelo correctamente

class UsersTestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recupera todos los usuarios
        $users = UsersTest::all();
        
        // Devuelve los usuarios como una respuesta JSON
        return response()->json($users);
    }
}

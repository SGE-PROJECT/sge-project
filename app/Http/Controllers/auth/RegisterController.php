<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request);
        // dd($request->get('username'));

        //Modificar el request

        //Validación de formularios
        $this->validate($request, [
            'name'=> 'required|max:30',
            'username'=> 'required|unique:users|min:3|max:25',
            'email'=> 'required|unique:users|email|max:60',
            'password'=> 'required|confirmed|min:6'
        ]);

        User::create([
            'name'=> $request->name,
            'username'=> Str::slug($request->username),
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        // //Autenticar al usuario
        // auth()->attempt([
        //     'email'=> $request->email,
        //     'password'=> $request->password,

        // ]);

        //Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));
        

        //Redireccionar al usuario
        return redirect()->route('posts.index');


    }
}

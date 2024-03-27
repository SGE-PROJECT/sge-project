<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd(auth()->user());
        return view('administrator.dashboard.dashboard-general');
    }
}

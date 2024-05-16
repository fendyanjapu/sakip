<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');      
    }

    public function logout()
    {
        Session::flush();
        return redirect()->to('home/login');
    }
}

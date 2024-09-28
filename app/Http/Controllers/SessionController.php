<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $request)
    {


        dd(\Session::get('name'), $request->session()->get('name'));

        return view('session.index');
    }
}

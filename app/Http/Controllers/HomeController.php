<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {


        session()->flash('flash.banner', 'Welcome to The Torettos!');
        session()->flash('flash.bannerStyle', 'success');

        return view('Home');
    }
}

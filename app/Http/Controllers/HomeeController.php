<?php

namespace App\Http\Controllers;

class HomeeController extends Controller
{
    public function __invoke()
    {
        return view('products-home');

    }
}

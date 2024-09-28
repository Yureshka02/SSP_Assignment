<?php

namespace App\Http\Controllers;

use App\Models\serviceCategory;
use App\Models\serviceProduct;

class serviceHomeController extends Controller
{
    public function __invoke()
    {
        $categories = serviceCategory::where('status', 1)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('sort_order', 'asc')
            ->get();

        $products = serviceProduct::where('status', 1)
            ->with('serviceCategory')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('services-home',['categories' => $categories, 'products' => $products]);

    }
}

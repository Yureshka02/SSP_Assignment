<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function index()
    {


        // check if a cache exists for products
        if(Cache::has('products')) {
            $products = Cache::get('products');
        } else {
            $products = (new Product())->get();
            Cache::put('products', $products, 60);
        }

        return view('cache.index', [
            'products' => $products,
        ]);
    }

    public function logs()
    {

    }
}

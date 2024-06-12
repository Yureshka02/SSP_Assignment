<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use App\Http\Requests\StoreSuppliersRequest;
use App\Http\Requests\UpdateSuppliersRequest;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('suppliers.index', [
        'suppliers' => Suppliers::orderBy('id', 'desc')->paginate()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuppliersRequest $request)
    {
        $validated = $request->validated();
        $baseSlug = \Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;

        // Ensure the slug is unique
        while (Suppliers::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;
        Suppliers::create($validated);
        return redirect()->route('suppliers.index')
            ->with('flash.banner', 'Supplier created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supplier = Suppliers::findOrFail($id);
        return view('suppliers.show', compact('supplier'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = Suppliers::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'product' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $supplier = Suppliers::findOrFail($id);
        $supplier->update($validated);
        return redirect()->route('suppliers.index')
            ->with('flash.banner', 'Supplier updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = Suppliers::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index')
            ->with('flash.banner', 'Supplier deleted successfully');
    }
}

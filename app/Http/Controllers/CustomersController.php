<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index', [
            'customers' => Customers::orderBy('id', 'desc')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request)
    {
        $validated = $request->validated();
        $baseSlug = \Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;

        // Ensure the slug is unique
        while (Customers::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;
        Customers::create($validated);
        return redirect()->route('customers.index')
            ->with('flash.banner', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customers::findOrFail($id);
        return view('customers.show', compact('customer'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        return view('customers.edit', compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            //tier
            'tier' => ['required', 'string', 'max:255'],
        ]);
        $customer = Customers::findOrFail($id);
        $customer->update($validated);
        return redirect()->route('customers.index')
            ->with('flash.banner', 'Customer updated successfully');
    }
        //


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')
            ->with('flash.banner', 'Customer deleted successfully');

    }
}

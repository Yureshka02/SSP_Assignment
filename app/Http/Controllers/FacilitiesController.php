<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Http\Requests\StoreFacilitiesRequest;
use App\Http\Requests\UpdateFacilitiesRequest;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('facilities.index', [
            'facilities' => Facilities::orderBy('id', 'desc')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilitiesRequest $request)
    {
        $validated = $request->validated();
        $baseSlug = \Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;

        // Ensure the slug is unique
        while (Facilities::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;
        Facilities::create($validated);
        return redirect()->route('facilities.index')
            ->with('flash.banner', 'Facility created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)

    {
        $facility = Facilities::findOrFail($id);
        return view('facilities.show', compact('facility'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $facility = Facilities::findOrFail($id);
        return view('facilities.edit', compact('facility'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'availability' => 'required',

        ]);
        $facility = Facilities::findOrFail($id);
        $facility->update($validated);
        return redirect()->route('facilities.index')
            ->with('flash.banner', 'Facility updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id )
    {
        $facility= Facilities::findOrFail($id);
        $facility->delete();
        return redirect()->route('facilities.index')
            ->with('flash.banner', 'Facility deleted successfully');
    }
}

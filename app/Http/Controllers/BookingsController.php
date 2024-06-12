<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Http\Requests\StoreBookingsRequest;
use App\Http\Requests\UpdateBookingsRequest;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bookings.index', [
            'bookings' => Bookings::orderBy('id', 'desc')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingsRequest $request)
    {
        $validated = $request->validated();
        $baseSlug = \Str::slug($validated['customer_name']);
        $slug = $baseSlug;
        $counter = 1;

        // Ensure the slug is unique
        while (Bookings::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;
        Bookings::create($validated);
        return redirect()->route('Bookings.index')
            ->with('flash.banner', 'Booking created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Bookings::findOrFail($id);
        return view('bookings.show', compact('booking'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booking = Bookings::findOrFail($id);
        return view('bookings.edit', compact('booking'));

    }

    /**
     * Update the specified resource in storage.
     */

   public function update(Request $request, $id)
   {
       $validated = $request->validate([
           'customer_name' => 'required',
           'customer_phone' => 'required',
           'address' => 'required',
           'employee_id' => 'required',
           'time' => 'required',
       ]);

       $booking = Bookings::findOrFail($id);
       $booking->update($validated);

       return redirect()->route('Bookings.index')->with('flash.banner', 'Booking updated successfully');
   }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Bookings::findOrFail($id);
        $booking->delete();
        return redirect()->route('Bookings.index')->with('flash.banner', 'Booking deleted successfully');
    }
}

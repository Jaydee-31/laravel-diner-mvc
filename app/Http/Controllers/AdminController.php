<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::query();
        $bookings = $bookings->paginate(7);
        return view('bookings.index', compact('bookings'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'people' => 'required',
            'message' => 'required'
        ]);
    
        Booking::create($request->all());
    
        return redirect()->route('bookings.index')
            ->with('success','Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
        public function show(Booking $booking)
    {
        return view('bookings.show',compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit',compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'people' => 'required',
            'message' => 'required'
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
            ->with('success','Booking updated successfully');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')
            ->with('success','Booking deleted successfully');

    }
}

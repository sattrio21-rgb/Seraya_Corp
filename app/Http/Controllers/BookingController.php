<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Package $package)
    {
        return view('booking.create', compact('package'));
    }

    public function store(Request $request, Package $package)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $request->user()->bookings()->create([
            'package_id' => $package->id,
            'booking_date' => $validated['booking_date'],
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Booking berhasil! Menunggu konfirmasi.');
    }
}

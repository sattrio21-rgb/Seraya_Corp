<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function myOrders()
    {
        $bookings = auth()->user()->bookings()
            ->with(['package', 'payment'])
            ->latest()
            ->get();

        return view('booking.my-orders', compact('bookings'));
    }

    public function create(Package $package)
    {
        return view('booking.create', compact('package'));
    }

    public function store(Request $request, Package $package)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $booking = $request->user()->bookings()->create([
            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'package_id' => $package->id,
            'booking_date' => $validated['booking_date'],
            'status' => 'pending',
        ]);

        return redirect()->route('payment.show', $booking)->with('success', 'Booking berhasil! Silakan lakukan pembayaran.');
    }
}

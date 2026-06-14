<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Booking $booking)
    {
        // Check if booking belongs to user
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        // Check if already paid
        if ($booking->payment) {
            return view('payment.show', compact('booking'));
        }

        return view('payment.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        // Check if booking belongs to user
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        // Check if already paid
        if ($booking->payment) {
            return redirect()->route('payment.show', $booking);
        }

        $validated = $request->validate([
            'proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $proofPath = $request->file('proof')->store('proofs', 'public');

        $booking->payment()->create([
            'amount' => $booking->package->price,
            'method' => 'qris',
            'proof' => $proofPath,
            'status' => 'pending',
        ]);

        return redirect()->route('payment.show', $booking)->with('success', 'Bukti pembayaran berhasil dikirim! Menunggu verifikasi.');
    }
}

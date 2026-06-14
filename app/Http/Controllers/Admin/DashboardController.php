<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'package'])
            ->latest()
            ->get();

        return view('admin.dashboard', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,process,accepted,rejected',
        ]);

        $booking->update(['status' => $validated['status']]);

        $statusText = match($validated['status']) {
            'process' => 'diproses',
            'accepted' => 'diterima',
            'rejected' => 'ditolak',
            default => 'diperbarui',
        };

        return redirect()->route('admin.dashboard')->with('success', "Status booking berhasil {$statusText}.");
    }

    public function verifyPayment(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'status' => 'required|in:verified,rejected',
        ]);

        $payment->update(['status' => $validated['status']]);

        $statusText = $validated['status'] === 'verified' ? 'dikonfirmasi' : 'ditolak';

        return redirect()->route('admin.dashboard')->with('success', "Pembayaran berhasil {$statusText}.");
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Pesanan berhasil dihapus.');
    }
}

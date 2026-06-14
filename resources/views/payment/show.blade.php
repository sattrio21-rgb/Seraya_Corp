@extends('layouts.app')

@section('title', 'Status Pembayaran - Seraya Travel')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4">
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($booking->payment->status === 'pending')
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Menunggu Verifikasi</h1>
            <p class="text-gray-500 mb-6">Bukti pembayaran kamu sedang diverifikasi oleh admin.</p>
        @elseif($booking->payment->status === 'verified')
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Pembayaran Diterima!</h1>
            <p class="text-gray-500 mb-6">Pembayaran kamu sudah dikonfirmasi. Selamat menikmati perjalanan!</p>
        @else
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Pembayaran Ditolak</h1>
            <p class="text-gray-500 mb-6">Bukti pembayaran kamu tidak valid. Silakan hubungi admin.</p>
        @endif

        <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
            <h3 class="font-bold text-gray-800 mb-3">Detail Booking</h3>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Paket</span>
                    <span class="font-medium">{{ $booking->package->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Tanggal Trip</span>
                    <span class="font-medium">{{ $booking->booking_date->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Status Booking</span>
                    <span class="font-medium capitalize">{{ $booking->status }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Status Bayar</span>
                    <span class="font-medium capitalize">{{ $booking->payment->status }}</span>
                </div>
                <div class="border-t pt-2 flex justify-between">
                    <span class="font-bold">Total</span>
                    <span class="font-bold text-primary">Rp. {{ number_format($booking->payment->amount, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <a href="{{ route('home') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-opacity-90 transition">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection

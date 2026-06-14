@extends('layouts.app')

@section('title', 'Pesanan Saya - Seraya Travel')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-serif font-bold text-primary mb-2">Pesanan Saya</h1>
    <p class="text-gray-500 mb-8">Daftar booking dan status pesananmu</p>

    @if($bookings->isEmpty())
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <p class="text-gray-500 mb-4">Belum ada pesanan</p>
            <a href="{{ route('visitor.packages') }}" class="inline-block bg-primary text-white px-6 py-2 rounded-full text-sm hover:bg-opacity-90 transition">
                Lihat Paket Wisata
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($bookings as $booking)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">{{ $booking->package->name }}</h3>
                            <p class="text-sm text-gray-500">Tanggal Trip: {{ $booking->booking_date->format('d M Y') }}</p>
                            <p class="text-sm text-gray-500">Dipesan: {{ $booking->created_at->format('d M Y H:i') }}</p>
                        </div>

                        <div class="flex flex-col gap-2 md:items-end">
                            {{-- Status Booking --}}
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500">Booking:</span>
                                @if($booking->status === 'pending')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Pending</span>
                                @elseif($booking->status === 'process')
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Diproses</span>
                                @elseif($booking->status === 'accepted')
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Diterima</span>
                                @else
                                    <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Ditolak</span>
                                @endif
                            </div>

                            {{-- Status Pembayaran --}}
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500">Bayar:</span>
                                @if($booking->payment)
                                    @if($booking->payment->status === 'pending')
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Menunggu Verifikasi</span>
                                    @elseif($booking->payment->status === 'verified')
                                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Terverifikasi</span>
                                    @else
                                        <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Ditolak</span>
                                    @endif
                                @else
                                    <span class="px-3 py-1 bg-gray-100 text-gray-500 text-xs font-semibold rounded-full">Belum Bayar</span>
                                @endif
                            </div>

                            {{-- Harga --}}
                            <p class="text-sm font-bold text-primary">Rp. {{ number_format($booking->package->price, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="mt-4 pt-4 border-t flex gap-2">
                        @if(!$booking->payment)
                            <a href="{{ route('payment.show', $booking) }}" class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-opacity-90 transition">
                                Bayar Sekarang
                            </a>
                        @elseif($booking->payment->status === 'pending')
                            <a href="{{ route('payment.show', $booking) }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-200 transition">
                                Lihat Status Bayar
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

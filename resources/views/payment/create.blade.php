@extends('layouts.app')

@section('title', 'Pembayaran - Seraya Travel')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-serif font-bold text-primary mb-2">Pembayaran</h1>
    <p class="text-gray-500 mb-8">Scan QRIS untuk melakukan pembayaran</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- QRIS Section -->
        <div class="bg-white rounded-2xl shadow-lg p-4">
            <h2 class="text-lg font-bold text-gray-800 mb-4 text-center">Scan QRIS</h2>
            <div class="flex justify-center">
                <img src="{{ asset('images/qris.png') }}" alt="QRIS Code" class="w-full h-auto rounded-lg">
            </div>
        </div>

        <!-- Payment Info & Upload -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Detail Pembayaran</h2>

            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-gray-500">Paket</span>
                    <span class="font-medium">{{ $booking->package->name }}</span>
                </div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-gray-500">Tanggal Trip</span>
                    <span class="font-medium">{{ $booking->booking_date->format('d M Y') }}</span>
                </div>
                <div class="border-t mt-2 pt-2 flex justify-between">
                    <span class="font-bold">Total Bayar</span>
                    <span class="font-bold text-primary text-lg">Rp. {{ number_format($booking->package->price, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Upload Form -->
            <form method="POST" action="{{ route('payment.store', $booking) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Bukti Pembayaran</label>
                    <input type="file" name="proof" accept="image/*" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maks 2MB.</p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-3 mb-4">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-opacity-90 transition">
                    Kirim Bukti Pembayaran
                </button>
            </form>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-primary">← Kembali ke Beranda</a>
    </div>
</div>
@endsection

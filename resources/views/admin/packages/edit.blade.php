@extends('admin.layouts.app')

@section('title', 'Edit Paket Wisata')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.packages.index') }}" class="text-sm text-gray-500 hover:text-primary flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>
</div>

<h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Paket Wisata</h1>

<div class="bg-white rounded-2xl shadow-lg p-6 max-w-2xl">
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-4 mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.packages.update', $package) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Paket</label>
            <input type="text" id="name" name="name" value="{{ old('name', $package->name) }}" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea id="description" name="description" rows="4" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ old('description', $package->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
            <input type="number" id="price" name="price" value="{{ old('price', $package->price) }}" min="0" step="1000" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        </div>

        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar (opsional)</label>
            @if($package->image)
                <div class="mb-2">
                    <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}" class="w-32 h-20 object-cover rounded-lg">
                    <p class="text-xs text-gray-500 mt-1">Gambar saat ini. Upload baru untuk mengganti.</p>
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maks 2MB.</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.packages.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-opacity-90 transition">
                Perbarui Paket
            </button>
        </div>
    </form>
</div>
@endsection

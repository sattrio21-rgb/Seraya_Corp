@extends('admin.layouts.app')

@section('title', 'Paket Wisata')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Paket Wisata</h1>
        <p class="text-sm text-gray-500">Kelola paket wisata yang tersedia</p>
    </div>
    <a href="{{ route('admin.packages.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Paket
    </a>
</div>

@if($packages->isEmpty())
    <div class="bg-white rounded-2xl shadow-lg p-12 text-center text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        </svg>
        <p>Belum ada paket wisata</p>
        <a href="{{ route('admin.packages.create') }}" class="inline-block mt-4 text-primary hover:underline">Tambah paket pertama</a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($packages as $package)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                @if($package->image)
                    <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}" class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-gray-800">{{ $package->name }}</h3>
                        @if($package->is_available)
                            <span class="px-2 text-xs font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                        @else
                            <span class="px-2 text-xs font-semibold rounded-full bg-red-100 text-red-800">Tidak Tersedia</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $package->description }}</p>
                    <p class="text-lg font-bold text-primary mb-4">Rp. {{ number_format($package->price, 0, ',', '.') }}</p>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.packages.edit', $package) }}"
                           class="flex-1 text-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.packages.availability', $package) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    class="w-full px-3 py-2 rounded-lg text-sm transition {{ $package->is_available ? 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                                {{ $package->is_available ? 'Sembunyikan' : 'Tampilkan' }}
                            </button>
                        </form>
                        <form action="{{ route('admin.packages.destroy', $package) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-2 bg-red-100 text-red-700 rounded-lg text-sm hover:bg-red-200 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection

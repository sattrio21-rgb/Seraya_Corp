@extends('admin.layouts.app')

@section('title', 'Edit Beranda')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-primary flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>
</div>

<h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Konten Beranda</h1>

@if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-4 mb-6">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.pages.update') }}">
    @csrf
    @method('PUT')

    {{-- Tentang Kami --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Tentang Kami</h2>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="about_title" value="{{ $pages->get('about_title')->content ?? 'Tentang Travel Kami' }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="about_content" rows="4"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ $pages->get('about_content')->content ?? '' }}</textarea>
        </div>
    </div>

    {{-- Pendiri --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Pendiri</h2>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="founder_name" value="{{ $pages->get('founder_name')->content ?? 'Fiddan' }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="founder_description" rows="3"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ $pages->get('founder_description')->content ?? '' }}</textarea>
        </div>
    </div>

    {{-- Alasan Memilih Kami --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Alasan Memilih Kami</h2>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Section</label>
            <input type="text" name="values_title" value="{{ $pages->get('values_title')->content ?? 'Alasan Memilih Kami' }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @for($i = 0; $i < 4; $i++)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nilai {{ $i + 1 }}</label>
                    <textarea name="values[]" rows="2"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">{{ $pages->get("value_{$i}")->content ?? '' }}</textarea>
                </div>
            @endfor
        </div>
    </div>

    <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-opacity-90 transition">
        Simpan Perubahan
    </button>
</form>
@endsection

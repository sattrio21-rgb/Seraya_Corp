{{--
/**
 * @var \Illuminate\Support\Collection $pages
 * @var \Illuminate\Support\Collection $packages
 * @var \App\Models\Package $package
 */
--}}
@extends('layouts.app')

@section('title', 'Seraya Travel')

@section('content')

    {{-- HERO SECTION --}}
    <section class="max-w-7xl mx-auto mt-6 px-4 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 h-auto md:h-[550px]">

            {{-- Left Large Image --}}
            <div class="md:col-span-7 relative rounded-xl overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?q=80&w=2071&auto=format&fit=crop" alt="Bromo" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                <div class="absolute bottom-10 left-8 right-8 text-white">
                    <h2 class="font-serif text-3xl mb-3">Travel</h2>
                    <p class="text-sm leading-relaxed text-gray-200 max-w-lg">
                        Seraya Travel adalah penyedia layanan perjalanan yang berfokus untuk memberikan pengalaman liburan yang aman, nyaman, dan berkesan.
                    </p>
                </div>
            </div>

            {{-- Right Side Columns --}}
            <div class="md:col-span-5 flex flex-col gap-4">
                <div class="flex-1 relative rounded-xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1534234828563-0252172f426e?q=80&w=1974&auto=format&fit=crop" alt="Jeep" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent"></div>
                    <div class="absolute bottom-8 left-6 text-white max-w-xs">
                        <h3 class="font-serif text-xl mb-2 text-orange-300">Inspirasi Perjalanan</h3>
                        <p class="text-xs leading-relaxed">Setiap perjalanan adalah cerita baru. Kami ingin menginspirasi Anda untuk menjadikan perjalanan sebagai pengalaman berharga dalam hidup.</p>
                    </div>
                </div>
                <div class="flex-1 relative rounded-xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1605649482396-2d0c127e744d?q=80&w=2070&auto=format&fit=crop" alt="Jeeps" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent"></div>
                    <div class="absolute bottom-8 left-6 text-white max-w-xs">
                        <h3 class="font-serif text-xl mb-2 text-blue-300">Nilai Kami</h3>
                        <p class="text-xs leading-relaxed">Kami mengutamakan kenyamanan, keamanan, dan pelayanan ramah, agar setiap langkah perjalanan Anda penuh kenangan indah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section class="max-w-7xl mx-auto mt-12 px-4 md:px-8">
        <div class="bg-primary rounded-xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4"></div>

            <div class="flex-1 text-white z-10">
                <h2 class="font-serif text-3xl mb-6">{{ $pages->get('about_title')->content ?? 'Tentang Travel Kami' }}</h2>
                <p class="text-gray-200 leading-relaxed text-sm md:text-base max-w-xl">
                    {{ $pages->get('about_content')->content ?? 'Kami adalah penyedia layanan perjalanan yang berkomitmen memberikan pengalaman liburan yang aman, nyaman, dan berkesan.' }}
                </p>
            </div>

            <div class="flex-1 w-full flex justify-center md:justify-end z-10">
                <div class="bg-white text-gray-800 p-8 rounded-2xl shadow-2xl max-w-md relative mt-8 md:mt-0">
                    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
                        <div class="w-20 h-20 rounded-full border-4 border-white overflow-hidden shadow-md">
                            @if($pages->get('founder_photo') && $pages->get('founder_photo')->image)
                                <img src="{{ Storage::url($pages->get('founder_photo')->image) }}" alt="Founder" class="w-full h-full object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1000&auto=format&fit=crop" alt="Founder" class="w-full h-full object-cover">
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-8">
                        <h4 class="font-serif italic font-bold text-lg mb-4">{{ $pages->get('founder_name')->content ?? 'Fiddan' }}</h4>
                        <p class="text-sm leading-relaxed text-gray-600">
                            {{ $pages->get('founder_description')->content ?? 'Pendiri kami percaya bahwa setiap perjalanan adalah cerita berharga.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ALASAN MEMILIH KAMI --}}
    @php
        $icons = [
            '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />',
            '<path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />',
            '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />',
            '<path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />',
        ];
    @endphp

    <section class="max-w-7xl mx-auto mt-20 px-4 md:px-8 mb-20">
        <h2 class="font-serif text-3xl text-primary mb-10 font-bold">{{ $pages->get('values_title')->content ?? 'Alasan Memilih Kami' }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @for($i = 0; $i < 4; $i++)
                @if($pages->get("value_{$i}"))
                    <div class="flex flex-col items-start">
                        <div class="mb-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                {!! $icons[$i] !!}
                            </svg>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            {{ $pages->get("value_{$i}")->content }}
                        </p>
                    </div>
                @endif
            @endfor
        </div>
    </section>

    {{-- PILIHAN PAKET --}}
    <section id="paket-section" class="max-w-7xl mx-auto px-4 md:px-8 mb-24">
        <h2 class="font-serif text-2xl font-bold text-primary mb-8">Pilihan Paket</h2>

        @if($packages->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <p>Belum ada paket wisata tersedia.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($packages as $package)
                    @auth('web')
                        @if(auth()->user()->role !== 'admin')
                            <a href="{{ route('booking.create', $package) }}" class="block border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300 cursor-pointer">
                        @else
                            <div class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300">
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300 cursor-pointer">
                    @endauth
                        <div class="h-48 overflow-hidden">
                            @if($package->image)
                                <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h4 class="font-medium text-sm mb-2">{{ $package->name }}</h4>
                            <p class="text-xs text-gray-500 mb-4 line-clamp-2">{{ $package->description }}</p>
                            <div class="border-t border-gray-100 pt-3">
                                <span class="text-xs font-bold text-gray-800">Rp. {{ number_format($package->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @auth('web')
                        @if(auth()->user()->role !== 'admin')
                            </a>
                        @else
                            </div>
                        @endif
                    @else
                        </a>
                    @endauth
                @endforeach
            </div>
        @endif
    </section>

@endsection

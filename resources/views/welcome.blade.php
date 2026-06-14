<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seraya Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        primary: '#2C4463',
                        secondary: '#FDF7F5',
                        accent: '#D1D5DB',
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 4px; }
    </style>
</head>
<body class="bg-white text-gray-800 antialiased font-sans">

    <!-- NAVBAR -->
    <nav class="bg-primary text-white py-4 px-6 md:px-16 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 border-2 border-white rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
            </div>
            <span class="font-serif text-2xl tracking-widest font-bold uppercase">Seraya</span>
        </div>

        <!-- Menu -->
        <div class="hidden md:flex gap-8 text-sm tracking-wide font-light">
            <a href="{{ route('home') }}" class="hover:text-gray-300 transition">BERANDA</a>
            <a href="{{ route('visitor.packages') }}" class="hover:text-gray-300 transition">PAKET WISATA</a>
        </div>

        <!-- Auth -->
        <div class="flex items-center gap-4 text-sm">
            @auth('web')
                @if(auth()->user()->role !== 'admin')
                    <span class="font-medium">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-white/20 px-5 py-2 rounded-full hover:bg-white/30 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="font-medium hover:text-gray-300">SIGN IN</a>
                    <a href="{{ route('login') }}" class="bg-white/20 px-5 py-2 rounded-full hover:bg-white/30 transition">Log in</a>
                @endif
            @else
                <a href="{{ route('register') }}" class="font-medium hover:text-gray-300">SIGN IN</a>
                <a href="{{ route('login') }}" class="bg-white/20 px-5 py-2 rounded-full hover:bg-white/30 transition">Log in</a>
            @endauth
        </div>
    </nav>

    <!-- Success Message -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4">
            <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg p-4">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto mt-6 px-4 md:px-0">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 h-auto md:h-[550px]">

            <!-- Left Large Image -->
            <div class="md:col-span-7 relative rounded-xl overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?q=80&w=2071&auto=format&fit=crop" alt="Bromo" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                <div class="absolute bottom-10 left-8 right-8 text-white">
                    <h2 class="font-serif text-3xl mb-3">Travel</h2>
                    <p class="text-sm leading-relaxed text-gray-200 max-w-lg">
                        Seraya Travel adalah penyedia layanan perjalanan yang berfokus untuk memberikan pengalaman liburan yang aman, nyaman, dan berkesan. Kami hadir untuk membantu setiap pelanggan menemukan destinasi impian, baik untuk perjalanan wisata, ziarah, liburan keluarga, maupun perjalanan bisnis.
                    </p>
                </div>
            </div>

            <!-- Right Side Columns -->
            <div class="md:col-span-5 flex flex-col gap-4">
                <!-- Top Right -->
                <div class="flex-1 relative rounded-xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1534234828563-0252172f426e?q=80&w=1974&auto=format&fit=crop" alt="Jeep" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent"></div>
                    <div class="absolute bottom-8 left-6 text-white max-w-xs">
                        <h3 class="font-serif text-xl mb-2 text-orange-300">Inspirasi Perjalanan</h3>
                        <p class="text-xs leading-relaxed">Setiap perjalanan adalah cerita baru. Kami ingin menginspirasi Anda untuk menjadikan perjalanan sebagai pengalaman berharga dalam hidup.</p>
                    </div>
                </div>
                <!-- Bottom Right -->
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

    <!-- TENTANG KAMI (About Us) -->
    <section class="max-w-7xl mx-auto mt-12 px-4 md:px-0">
        <div class="bg-primary rounded-xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4"></div>

            <!-- Left Text -->
            <div class="flex-1 text-white z-10">
                <h2 class="font-serif text-3xl mb-6">{{ $pages->get('about_title')->content ?? 'Tentang Travel Kami' }}</h2>
                <p class="text-gray-200 leading-relaxed text-sm md:text-base max-w-xl">
                    {{ $pages->get('about_content')->content ?? 'Kami adalah penyedia layanan perjalanan yang berkomitmen memberikan pengalaman liburan yang aman, nyaman, dan berkesan.' }}
                </p>
            </div>

            <!-- Right Card -->
            <div class="flex-1 w-full flex justify-center md:justify-end z-10">
                <div class="bg-white text-gray-800 p-8 rounded-2xl shadow-2xl max-w-md relative mt-8 md:mt-0">
                    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
                        <div class="w-20 h-20 rounded-full border-4 border-white overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1000&auto=format&fit=crop" alt="Founder" class="w-full h-full object-cover">
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

    <!-- ALASAN MEMILIH KAMI -->
    <section class="max-w-7xl mx-auto mt-20 px-4 md:px-0 mb-20">
        <h2 class="font-serif text-3xl text-primary mb-10 font-bold">{{ $pages->get('values_title')->content ?? 'Alasan Memilih Kami' }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @php
                $icons = [
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />',
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />',
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />',
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />',
                ];
            @endphp
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

    <!-- PILIHAN PAKET (Dynamic from Database) -->
    <section id="paket-section" class="max-w-7xl mx-auto px-4 md:px-0 mb-24">
        <div class="flex justify-between items-center mb-8">
            <h2 class="font-serif text-2xl font-bold text-primary">Pilihan Paket</h2>
        </div>

        @if($packages->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <p>Belum ada paket wisata tersedia.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($packages as $package)
                    <div class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300">
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
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="font-medium text-sm">{{ $package->name }}</h4>
                            </div>
                            <p class="text-xs text-gray-500 mb-4 line-clamp-2">{{ $package->description }}</p>
                            <div class="border-t border-gray-100 pt-3 flex justify-between items-center">
                                <span class="text-xs font-bold text-gray-800">Rp. {{ number_format($package->price, 0, ',', '.') }}</span>
                                @auth
                                    <a href="{{ route('booking.create', $package) }}" class="text-xs bg-primary text-white px-3 py-1.5 rounded-full hover:bg-opacity-90 transition">
                                        Booking
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-xs bg-primary text-white px-3 py-1.5 rounded-full hover:bg-opacity-90 transition">
                                        Login untuk Booking
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <!-- FOOTER -->
    <div class="relative" id="hubungi">
        <!-- Wave Decoration -->
        <div class="absolute top-0 left-0 w-full overflow-hidden -translate-y-[99%] leading-none">
             <svg class="relative block w-[calc(100%+1.3px)] h-[50px] text-secondary" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="white"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="fill-primary"></path>
            </svg>
             <div class="h-4 w-full bg-secondary absolute bottom-0"></div>
        </div>

        <footer class="bg-secondary pt-10 pb-6">
            <div class="max-w-7xl mx-auto px-4 md:px-0">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16 text-sm text-center md:text-left">
                    <!-- Col 1 -->
                    <div>
                        <h5 class="font-serif font-bold text-primary mb-4">Hubungi Kami</h5>
                        <ul class="space-y-3 text-gray-600 text-xs">
                            <li class="flex items-start justify-center md:justify-start gap-2">
                                <span class="text-red-500 mt-0.5">📍</span>
                                <span>Jl. Diponegoro No. 45, Malang, Jawa Timur</span>
                            </li>
                            <li class="flex items-center justify-center md:justify-start gap-2">
                                <span class="text-gray-800">📞</span>
                                <span>0812-8516-9123</span>
                            </li>
                            <li class="flex items-center justify-center md:justify-start gap-2">
                                <span class="text-gray-800">✉️</span>
                                <span>info@serayacorp.com</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Col 2 -->
                    <div>
                        <h5 class="font-serif font-bold text-primary mb-4">Layanan Kami</h5>
                        <ul class="space-y-2 text-gray-600 text-xs">
                            <li><a href="#paket-section" class="hover:text-primary">Event & Gathering Perusahaan</a></li>
                            <li><a href="#paket-section" class="hover:text-primary">Private Trip</a></li>
                            <li><a href="#paket-section" class="hover:text-primary">Open Trip</a></li>
                            <li><a href="#paket-section" class="hover:text-primary">Paket Wedding</a></li>
                        </ul>
                    </div>

                    <!-- Col 3 -->
                    <div>
                        <h5 class="font-serif font-bold text-primary mb-4">Support</h5>
                        <ul class="space-y-2 text-gray-600 text-xs">
                            <li><a href="#" class="hover:text-primary">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-primary">Syarat & Ketentuan</a></li>
                            <li><a href="#" class="hover:text-primary">Kebijakan Privasi</a></li>
                        </ul>
                    </div>

                    <!-- Col 4 -->
                    <div>
                        <h5 class="font-serif font-bold text-primary mb-4">Ikuti Kami</h5>
                        <ul class="space-y-2 text-gray-600 text-xs">
                            <li><a href="#" class="hover:text-primary">Facebook</a></li>
                            <li><a href="#" class="hover:text-primary">Instagram</a></li>
                            <li><a href="#" class="hover:text-primary">TikTok</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-200 pt-6 text-center">
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest">© COPYRIGHT SERAYA TRAVEL {{ date('Y') }}</p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>

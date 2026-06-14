<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - {{ $package->name }}</title>
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
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-primary text-white py-4 px-6 md:px-16 flex justify-between items-center shadow-md">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 border-2 border-white rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
            </div>
            <span class="font-serif text-2xl tracking-widest font-bold uppercase">Seraya</span>
        </a>
        <a href="{{ route('home') }}" class="text-sm hover:text-gray-300 transition">Kembali ke Beranda</a>
    </nav>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-serif font-bold text-primary mb-8">Booking Paket</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Package Info -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                @if($package->image)
                    <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $package->name }}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{ $package->description }}</p>
                    <div class="border-t pt-4">
                        <span class="text-2xl font-bold text-primary">Rp. {{ number_format($package->price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Formulir Booking</h3>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-4 mb-6">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('booking.store', $package) }}">
                    @csrf
                    <div class="mb-6">
                        <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Perjalanan</label>
                        <input type="date" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required
                            min="{{ date('Y-m-d') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                    </div>

                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Paket</span>
                            <span class="font-medium">{{ $package->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Harga</span>
                            <span class="font-medium">Rp. {{ number_format($package->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="border-t mt-2 pt-2 flex justify-between">
                            <span class="font-bold">Total</span>
                            <span class="font-bold text-primary">Rp. {{ number_format($package->price, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-opacity-90 transition">
                        Konfirmasi Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

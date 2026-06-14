<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Seraya Travel</title>
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
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                    <div class="w-10 h-10 border-2 border-primary rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </div>
                    <span class="font-serif text-2xl tracking-widest font-bold uppercase text-primary">Seraya</span>
                </a>
                <h1 class="text-2xl font-bold text-gray-800 mt-4">Selamat Datang Kembali</h1>
                <p class="text-gray-500 text-sm mt-1">Masuk ke akun Anda</p>
            </div>

            <!-- Error Message -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-4 mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
                </div>

                <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-opacity-90 transition">
                    Masuk
                </button>
            </form>

            <!-- Register Link -->
            <p class="text-center text-sm text-gray-500 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-primary font-medium hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seraya Travel')</title>
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
    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased font-sans">

    <!-- NAVBAR -->
    @include('components.navbar')

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4">
            <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg p-4">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    @include('components.footer')

    @stack('scripts')
</body>
</html>

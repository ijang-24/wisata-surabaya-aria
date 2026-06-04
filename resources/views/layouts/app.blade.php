<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surabaya Tourism - Soft Pink Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
    </style>
</head>
<body class="bg-[#faf5f6] text-zinc-700 antialiased">

    <nav class="bg-white/70 backdrop-blur-md sticky top-0 z-50 border-b border-pink-100/50 py-4 px-6 mb-8 shadow-xs">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-tight text-zinc-800">
                🌸 surabaya.<span class="text-pink-400 font-medium">soft</span>
            </h1>
            <a href="{{ route('wisata.index') }}" class="text-xs font-semibold text-pink-600 bg-pink-50 hover:bg-pink-100/80 px-4 py-2 rounded-xl transition-all duration-200">
                Dashboard Admin
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        @yield('content')
    </main>

    @if(session('success'))
    <script>
        Swal.fire({ 
            title: 'Berhasil!', 
            text: "{{ session('success') }}", 
            icon: 'success', 
            confirmButtonColor: '#f472b6' 
        });
    </script>
    @endif
</body>
</html>
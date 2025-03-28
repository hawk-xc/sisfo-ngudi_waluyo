<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posyandu Lansia Ngudi Waluyo</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-poppins">
    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center flex-wrap">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('assets/images/ngudiwaluyo_logo.jpg') }}" alt="Logo" class="h-12">
            <h1 class="text-2xl font-bold text-gray-800">Posyandu Ngudi Waluyo</h1>
        </div>
        <nav class="hidden md:block">
            <ul class="flex space-x-6 text-gray-600">
                <li><a href="#" class="hover:text-blue-500">Home</a></li>
                <li><a href="#" class="hover:text-blue-500">About</a></li>
                <li><a href="#" class="hover:text-blue-500">Services</a></li>
                <li><a href="#" class="hover:text-blue-500">Contact</a></li>
            </ul>
        </nav>
        <button id="menu-toggle" class="md:hidden text-gray-600 focus:outline-none">
            ☰
        </button>
        <nav id="mobile-menu" class="hidden absolute top-16 left-0 w-full bg-white shadow-md md:hidden">
            <ul class="flex flex-col space-y-4 py-4 text-center">
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">Home</a></li>
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">About</a></li>
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">Services</a></li>
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero min-h-screen bg-cover bg-center relative flex items-center justify-center text-center" style="background-image: url({{ asset('assets/images/bg-lansia.png') }})">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-white p-8 max-w-2xl">
            <h1 class="text-5xl font-bold">Selamat Datang</h1>
            <p class="mt-4 text-lg">Sistem Monitoring Kesehatan Lansia</p>
            <a href="{{ route('login') }}" class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full text-lg font-semibold">Masuk ke Sistem</a>
        </div>
    </div>

    <!-- Layanan -->
    <section class="py-16 bg-white text-center">
        <h3 class="text-3xl font-bold text-gray-800">Layanan Kami</h3>
        <div class="grid md:grid-cols-3 gap-6 mt-8 max-w-5xl mx-auto">
            <div class="card bg-gray-100 shadow-lg p-6 rounded-lg transition-transform transform hover:scale-105">
                <h4 class="text-xl font-semibold text-gray-800">Desain Web</h4>
                <p class="text-gray-600">Kami membuat desain web yang menarik dan responsif.</p>
            </div>
            <div class="card bg-gray-100 shadow-lg p-6 rounded-lg transition-transform transform hover:scale-105">
                <h4 class="text-xl font-semibold text-gray-800">Pengembangan Aplikasi</h4>
                <p class="text-gray-600">Membangun aplikasi web dan mobile yang handal.</p>
            </div>
            <div class="card bg-gray-100 shadow-lg p-6 rounded-lg transition-transform transform hover:scale-105">
                <h4 class="text-xl font-semibold text-gray-800">SEO & Digital Marketing</h4>
                <p class="text-gray-600">Meningkatkan visibilitas bisnis Anda secara online.</p>
            </div>
        </div>
    </section>

    <!-- Informasi Jumlah Lansia Terdaftar -->
    <section class="bg-blue-100 py-16 text-center">
        <h3 class="text-2xl font-semibold mb-4">Jumlah Lansia Terdaftar</h3>
        <p class="text-5xl font-bold text-blue-600">{{ \App\Models\Lansia::count() }}</p>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <p>&copy; 2025 Posyandu Ngudi Waluyo. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>

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

<body class="text-gray-900 bg-gray-100 font-poppins">
    <!-- Header -->
    <header class="flex flex-wrap items-center justify-between px-6 py-4 bg-white shadow-md">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('assets/images/ngudiwaluyo_logo.jpg') }}" alt="Logo" class="h-12">
            <h1 class="text-2xl font-bold text-gray-800">Poslansia Ngudi Waluyo Banjarsari</h1>
        </div>
        <nav class="hidden md:block">
            <ul class="flex space-x-6 text-gray-600">
                <li><a href="#" class="hover:text-blue-500">Halaman Utama</a></li>
                <li><a href="#profil" class="hover:text-blue-500">Profil</a></li>
                <li><a href="#kegiatan" class="hover:text-blue-500">Kegiatan</a></li>
                <li><a href="#" class="hover:text-blue-500">Contact</a></li>
            </ul>
        </nav>
        <button id="menu-toggle" class="text-gray-600 md:hidden focus:outline-none">
            ☰
        </button>
        <nav id="mobile-menu" class="absolute left-0 hidden w-full bg-white shadow-md top-16 md:hidden">
            <ul class="flex flex-col py-4 space-y-4 text-center">
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">Halaman Utama</a></li>
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">Profil</a></li>
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">Kegiatan</a></li>
                <li><a href="#" class="block text-gray-600 hover:text-blue-500">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="relative flex items-center justify-center min-h-screen text-center bg-center bg-cover hero"
        style="background-image: url({{ asset('assets/images/bg-lansia.png') }})">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 max-w-2xl p-8 text-white">
            <h1 class="text-5xl font-bold">Selamat Datang</h1>
            <p class="mt-4 text-lg">Sistem Monitoring Kesehatan Lansia</p>
            <a href="{{ route('login') }}"
                class="inline-block px-6 py-3 mt-6 text-lg font-semibold text-white bg-blue-500 rounded-full hover:bg-blue-600">Masuk
                ke Sistem</a>
        </div>
    </div>

    <!-- Layanan -->
    <section class="h-screen py-16 text-center bg-white" id="profil">
        <h3 class="mb-4 text-3xl font-bold text-gray-800">Klinik Ngudi Waluyo</h3>
        <span>penjelasan dari klinik ndudi waluyo</span>
        {{-- <div class="grid max-w-5xl gap-6 mx-auto mt-8 md:grid-cols-3">
            <div class="p-6 transition-transform transform bg-gray-100 rounded-lg shadow-lg card hover:scale-105">
                <h4 class="text-xl font-semibold text-gray-800">Desain Web</h4>
                <p class="text-gray-600">Kami membuat desain web yang menarik dan responsif.</p>
            </div>
            <div class="p-6 transition-transform transform bg-gray-100 rounded-lg shadow-lg card hover:scale-105">
                <h4 class="text-xl font-semibold text-gray-800">Pengembangan Aplikasi</h4>
                <p class="text-gray-600">Membangun aplikasi web dan mobile yang handal.</p>
            </div>
            <div class="p-6 transition-transform transform bg-gray-100 rounded-lg shadow-lg card hover:scale-105">
                <h4 class="text-xl font-semibold text-gray-800">SEO & Digital Marketing</h4>
                <p class="text-gray-600">Meningkatkan visibilitas bisnis Anda secara online.</p>
            </div>
        </div> --}}
    </section>

    <!-- Informasi Kegiatan -->
    <section class="h-screen py-16 text-center">
        <h3 class="mb-4 text-2xl font-semibold">Kegiatan Klinik Ngudi Waluyo</h3>
        <p class="text-5xl font-bold text-blue-600">{{ \App\Models\Lansia::count() }}</p>
    </section>

    <!-- Informasi Jumlah Lansia Terdaftar -->
    <section class="py-16 text-center bg-blue-100">
        <h3 class="mb-4 text-2xl font-semibold">Jumlah Lansia Terdaftar</h3>
        <p class="text-5xl font-bold text-blue-600">{{ \App\Models\Lansia::count() }}</p>
    </section>

    <!-- Footer -->
    <footer class="py-6 mt-10 text-center text-white bg-gray-800">
        <p>&copy; 2025 Poslansia Ngudi Waluyo Banjarsari. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posyandu Lansia Ngudi Waluyo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="text-gray-900 bg-gray-50">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('assets/images/ngudiwaluyo_logo.png') }}" alt="Logo" class="h-12">
                <h1 class="text-xl font-bold text-blue-700">Poslansia Ngudi Waluyo Banjarsari</h1>
            </div>
            <nav class="hidden md:flex space-x-6 text-gray-700 font-medium">
                <a href="#" class="hover:text-blue-500">Halaman Utama</a>
                <a href="#profil" class="hover:text-blue-500">Profil</a>
                <a href="#kegiatan" class="hover:text-blue-500">Kegiatan</a>
                <a href="#contact" class="hover:text-blue-500">Kontak</a>
            </nav>
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <nav id="mobile-menu" class="hidden px-6 pb-4 md:hidden">
            <a href="#" class="block py-2 text-gray-700 hover:text-blue-500">Halaman Utama</a>
            <a href="#profil" class="block py-2 text-gray-700 hover:text-blue-500">Profil</a>
            <a href="#kegiatan" class="block py-2 text-gray-700 hover:text-blue-500">Kegiatan</a>
            <a href="#contact" class="block py-2 text-gray-700 hover:text-blue-500">Kontak</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url({{ asset('assets/images/bg-lansia.png') }})">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="z-10 max-w-2xl px-6 text-center text-white">
            <h2 class="text-4xl font-bold md:text-5xl">Selamat Datang</h2>
            <p class="mt-4 text-lg">Sistem Informasi Kesehatan Pos Lansia</p>
            <a href="{{ route('login') }}" class="inline-block px-6 py-3 mt-6 text-white bg-blue-600 rounded-full hover:bg-blue-700">Masuk ke Sistem</a>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="py-16 bg-white text-center">
        <h3 class="text-3xl font-bold text-gray-800">Profil Klinik Ngudi Waluyo</h3>
        <p class="mt-2 text-gray-600 max-w-xl mx-auto">Klinik Ngudi Waluyo berkomitmen untuk memberikan pelayanan kesehatan terbaik untuk para lansia melalui berbagai program kesehatan dan monitoring berkala.</p>
        <div class="grid grid-cols-1 gap-6 mt-10 md:grid-cols-3 max-w-6xl mx-auto">
            <div class="p-6 bg-gray-50 rounded-lg shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold text-blue-700">Pelayanan Kesehatan</h4>
                <p class="mt-2 text-gray-600">Pemeriksaan rutin, konsultasi kesehatan, dan penanganan penyakit lansia.</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-lg shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold text-blue-700">Kegiatan Sosial</h4>
                <p class="mt-2 text-gray-600">Kegiatan olahraga ringan, penyuluhan, dan silaturahmi lansia.</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-lg shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold text-blue-700">Data Terpusat</h4>
                <p class="mt-2 text-gray-600">Monitoring data kesehatan lansia yang terintegrasi dan terstruktur.</p>
            </div>
        </div>
    </section>
       <!-- Visi Misi Section -->
    <section id="visi" class="py-16 bg-gray-100 text-center">
        <h3 class="text-3xl font-bold text-gray-800">Visi & Misi</h3>
        <div class="max-w-4xl mx-auto mt-6 text-gray-700">
            <h4 class="text-xl font-semibold text-blue-700 mb-2">Visi</h4>
            <p class="mb-6">Menjadi pusat pelayanan kesehatan lansia yang unggul, mandiri, aktif, dan produktif melalui pendekatan promotif, preventif, kuratif, dan rehabilitatif.</p>
            <h4 class="text-xl font-semibold text-blue-700 mb-2">Misi</h4>
            <ul class="list-disc list-inside text-left max-w-2xl mx-auto">
                <li>Menyediakan pelayanan kesehatan berkualitas dan berkesinambungan bagi lansia.</li>
                <li>Meningkatkan kesadaran dan peran serta keluarga serta masyarakat dalam perawatan lansia.</li>
                <li>Mengembangkan sistem informasi kesehatan lansia berbasis teknologi.</li>
                <li>Memberikan edukasi dan kegiatan sosial yang meningkatkan kualitas hidup lansia.</li>
            </ul>
        </div>
        <div class="mt-12">
            <h4 class="text-2xl font-bold text-blue-700 mb-4">Moto Lansia</h4>
            <img src="{{ asset('assets/images/motto-lansia.png') }}" alt="Motto Lansia" class="mx-auto rounded-lg shadow-lg max-w-full md:max-w-xl">
        </div>
    </section>

    <!-- Kegiatan Section -->
    <section id="kegiatan" class="py-16 text-center bg-gray-100">
        <h3 class="text-3xl font-bold text-gray-800">Kegiatan Poslansia</h3>
        <p class="mt-2 text-gray-600">Berbagai kegiatan dilakukan secara rutin demi kesejahteraan para lansia.</p>
        <div class="flex flex-wrap justify-center gap-8 mt-10">
            <!-- Stat 1 -->
            <div class="flex items-center gap-4 p-6 bg-white rounded-lg shadow w-72">
                <i class="ri-group-line text-3xl text-blue-600"></i>
                <div class="text-left">
                    <p class="text-sm text-gray-500">Terbaru!</p>
                    <p class="text-2xl font-bold text-blue-600">{{ \App\Models\Lansia::count() }}</p>
                    <p class="text-sm text-gray-400">Jumlah Kegiatan Poslansia</p>
                </div>
            </div>
            <!-- Stat 2 -->
            <div class="flex items-center gap-4 p-6 bg-white rounded-lg shadow w-72">
                <i class="ri-user-line text-3xl text-purple-600"></i>
                <div class="text-left">
                    <p class="text-sm text-gray-500">Data Pasien Terbaru!</p>
                    <p class="text-2xl font-bold text-purple-600">{{ \App\Models\Lansia::count() }}</p>
                    <p class="text-sm text-gray-400">Jumlah Lansia Terdaftar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="contact" class="py-16 bg-white text-center">
        <h3 class="text-3xl font-bold text-gray-800">Hubungi Kami</h3>
        <p class="mt-2 text-gray-600">Anda dapat menghubungi kami untuk informasi lebih lanjut mengenai kegiatan dan layanan.</p>
        <div class="mt-6">
            <a href="mailto:info@ngudiwaluyo.id" class="inline-block px-6 py-3 text-white bg-blue-600 rounded-full hover:bg-blue-700">Email Kami</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 text-center text-white bg-gray-800">
        <p>&copy; 2025 Poslansia Ngudi Waluyo Banjarsari. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>

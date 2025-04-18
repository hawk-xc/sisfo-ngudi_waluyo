<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posyandu Lansia Ngudi Waluyo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a56db',
                        secondary: '#7e3af2',
                        dark: '#1f2d3d',
                        light: '#f8fafc',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, rgba(26, 86, 219, 0.9) 0%, rgba(126, 58, 242, 0.9) 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<<<<<<<<< Temporary merge branch 1
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
=========
<body class="font-sans text-gray-800 bg-gray-50">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('assets/images/ngudiwaluyo_logo.png') }}" alt="Logo" class="h-10 md:h-12">
                    <span class="ml-3 text-xl md:text-2xl font-bold text-primary">Poslansia Ngudi Waluyo</span>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="px-1 py-2 text-sm font-medium text-gray-700 hover:text-primary border-b-2 border-transparent hover:border-primary transition">Beranda</a>
                    <a href="#profil" class="px-1 py-2 text-sm font-medium text-gray-700 hover:text-primary border-b-2 border-transparent hover:border-primary transition">Profil</a>
                    <a href="#visi" class="px-1 py-2 text-sm font-medium text-gray-700 hover:text-primary border-b-2 border-transparent hover:border-primary transition">Visi Misi</a>
                    <a href="#kegiatan" class="px-1 py-2 text-sm font-medium text-gray-700 hover:text-primary border-b-2 border-transparent hover:border-primary transition">Kegiatan</a>
                    <a href="#contact" class="px-1 py-2 text-sm font-medium text-gray-700 hover:text-primary border-b-2 border-transparent hover:border-primary transition">Kontak</a>
                </nav>

                <!-- Login Button -->
                <div class="hidden md:block">
                    <a href="{{ route('login') }}" class="ml-8 inline-flex items-center px-4 py-2 border text-sm font-medium rounded-md text-white bg-primary hover:bg-white hover:text-blue-700 hover:border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="ml-2 inline-flex items-center px-2 py-2 border text-sm font-medium rounded-md text-blue-700 hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Daftar
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="menu-toggle" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-primary hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Beranda</a>
                <a href="#profil" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Profil</a>
                <a href="#visi" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Visi Misi</a>
                <a href="#kegiatan" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Kegiatan</a>
                <a href="#contact" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50">Kontak</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-primary hover:bg-gray-50">Masuk ke Sistem</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative">
        <div class="hero-gradient">
            <div class="absolute inset-0 bg-gray-900 opacity-40"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                        Pelayanan Kesehatan <span class="text-yellow-300">Lansia</span> Terbaik
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-100 max-w-3xl mx-auto mb-8">
                        Posyandu Lansia Ngudi Waluyo memberikan pelayanan kesehatan berkualitas untuk lansia dengan pendekatan holistik dan penuh kasih sayang.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('login') }}" class="px-8 py-3 bg-white text-primary font-semibold rounded-lg shadow-md hover:bg-gray-100 transition duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i> Masuk Sistem
                        </a>
                        <a href="#kegiatan" class="px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-primary transition duration-300">
                            <i class="fas fa-calendar-alt mr-2"></i> Kegiatan Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    <span class="block">Profil Posyandu Lansia</span>
                    <span class="block text-primary">Ngudi Waluyo</span>
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Memberikan pelayanan kesehatan terbaik untuk lansia sejak 2010
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="feature-card bg-gray-50 rounded-xl p-8 shadow-md transition duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white mb-4">
                            <i class="fas fa-heartbeat text-xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Pelayanan Kesehatan</h3>
                        <p class="text-gray-500">
                            Pemeriksaan kesehatan rutin, konsultasi dokter, pengecekan tekanan darah, gula darah, dan penanganan penyakit lansia secara komprehensif.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card bg-gray-50 rounded-xl p-8 shadow-md transition duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-secondary text-white mb-4">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Kegiatan Sosial</h3>
                        <p class="text-gray-500">
                            Senam lansia, penyuluhan kesehatan, kegiatan kreatif, dan silaturahmi untuk meningkatkan kualitas hidup dan kebahagiaan lansia.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card bg-gray-50 rounded-xl p-8 shadow-md transition duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-500 text-white mb-4">
                            <i class="fas fa-database text-xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Data Terpusat</h3>
                        <p class="text-gray-500">
                            Sistem informasi terintegrasi untuk memantau perkembangan kesehatan lansia secara berkala dan terstruktur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section id="visi" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="mb-12 lg:mb-0">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl mb-6">
                        Visi & Misi Kami
                    </h2>
                    
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-primary mb-3">Visi</h3>
                        <p class="text-gray-600">
                            Menjadi pusat pelayanan kesehatan lansia yang unggul, mandiri, aktif, dan produktif melalui pendekatan promotif, preventif, kuratif, dan rehabilitatif.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold text-primary mb-3">Misi</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Menyediakan pelayanan kesehatan berkualitas dan berkesinambungan bagi lansia</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Meningkatkan kesadaran dan peran serta keluarga serta masyarakat dalam perawatan lansia</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Mengembangkan sistem informasi kesehatan lansia berbasis teknologi</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Memberikan edukasi dan kegiatan sosial yang meningkatkan kualitas hidup lansia</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-primary">Moto Kami</h3>
                        <p class="text-gray-600 mt-2">"Lansia Sehat, Keluarga Bahagia"</p>
                    </div>
                    <img src="{{ asset('assets/images/motto-lansia.png') }}" alt="Moto Lansia" class="rounded-lg shadow-md w-full h-auto">
                    <div class="mt-6 text-center">
                        <p class="text-gray-600 italic">"Kesehatan lansia adalah investasi berharga untuk keluarga dan masyarakat"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kegiatan Section -->
    <section id="kegiatan" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Kegiatan Posyandu Lansia
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Berbagai program rutin untuk kesehatan dan kebahagiaan lansia
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Stat 1 -->
                <div class="stat-card bg-primary text-white p-6 rounded-xl shadow-lg text-center">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-calendar-check text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">{{ \App\Models\Lansia::count() }}</h3>
                    <p class="text-sm opacity-80">Kegiatan Rutin</p>
                </div>

                <!-- Stat 2 -->
                <div class="stat-card bg-secondary text-white p-6 rounded-xl shadow-lg text-center">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-user-friends text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">{{ \App\Models\Lansia::count() }}</h3>
                    <p class="text-sm opacity-80">Lansia Terdaftar</p>
                </div>

                <!-- Stat 3 -->
                <div class="stat-card bg-yellow-500 text-white p-6 rounded-xl shadow-lg text-center">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-user-md text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">12+</h3>
                    <p class="text-sm opacity-80">Tenaga Medis</p>
                </div>

                <!-- Stat 4 -->
                <div class="stat-card bg-green-500 text-white p-6 rounded-xl shadow-lg text-center">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-heart text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-2">98%</h3>
                    <p class="text-sm opacity-80">Kepuasan Lansia</p>
                </div>
            </div>

            <!-- Kegiatan Cards -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kegiatan 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Senam Lansia" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Setiap Senin</span>
                            <span class="ml-2 text-gray-500 text-sm">08.00 - 09.00</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Senam Lansia</h3>
                        <p class="text-gray-600">Senam ringan khusus lansia untuk menjaga kebugaran dan kesehatan sendi.</p>
                    </div>
                </div>

                <!-- Kegiatan 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Pemeriksaan Kesehatan" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Setiap Rabu</span>
                            <span class="ml-2 text-gray-500 text-sm">09.00 - 12.00</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Pemeriksaan Kesehatan</h3>
                        <p class="text-gray-600">Pengecekan tekanan darah, gula darah, dan konsultasi kesehatan gratis.</p>
                    </div>
                </div>

                <!-- Kegiatan 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Penyuluhan Kesehatan" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Bulanan</span>
                            <span class="ml-2 text-gray-500 text-sm">10.00 - 11.30</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Penyuluhan Kesehatan</h3>
                        <p class="text-gray-600">Edukasi tentang pola hidup sehat, nutrisi, dan pencegahan penyakit lansia.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Apa Kata Mereka?
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Testimoni dari lansia dan keluarga tentang pelayanan kami
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimoni 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Testimoni 1" class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Ny. Paijem</h4>
                            <p class="text-gray-500 text-sm">PJ Pasien</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Pelayanan di Posyandu Lansia Ngudi Waluyo sangat memuaskan. Petugasnya ramah dan pemeriksaan kesehatannya sangat membantu saya memantau kondisi tubuh."
                    </p>
                    <div class="flex mt-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>

                <!-- Testimoni 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Testimoni 2" class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Tn. Paijo</h4>
                            <p class="text-gray-500 text-sm">PJ Pasien</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Sebagai anak, saya sangat terbantu dengan adanya Posyandu ini. Kesehatan orang tua saya bisa terpantau dengan baik dan ada kegiatan sosial yang membuat mereka bahagia."
                    </p>
                    <div class="flex mt-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold sm:text-4xl mb-6">
                Siap Bergabung dengan Kami?
            </h2>
            <p class="text-xl max-w-3xl mx-auto mb-8">
                Daftarkan lansia tercinta Anda untuk mendapatkan pelayanan kesehatan terbaik dan bergabung dalam berbagai kegiatan bermanfaat.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('login') }}" class="px-8 py-3 bg-white text-primary font-semibold rounded-lg shadow-md hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                </a>
                <a href="#contact" class="px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-primary transition duration-300">
                    <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->

    <section id="contact" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16">
                <div class="mb-12 lg:mb-0">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl mb-6">
                        Hubungi Kami
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Kami siap membantu Anda. Silakan hubungi kami melalui informasi kontak berikut atau kunjungi langsung posyandu kami.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded-lg text-primary">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Alamat</h3>
                                <p class="mt-1 text-gray-600">Jl. Banjarsari No. 123, Surakarta, Jawa Tengah</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded-lg text-primary">
                                <i class="fas fa-phone-alt text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Telepon</h3>
                                <p class="mt-1 text-gray-600">(0271) 1234567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded-lg text-primary">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Email</h3>
                                <p class="mt-1 text-gray-600">info@ngudiwaluyo.id</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded-lg text-primary">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Jam Operasional</h3>
                                <p class="mt-1 text-gray-600">Senin - Jumat: 08.00 - 16.00 WIB</p>
                                <p class="text-gray-600">Sabtu: 08.00 - 12.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 font-medium">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/images/ngudiwaluyo_logo.png') }}" alt="Logo" class="h-10 mr-3">
                        <span class="text-xl font-bold">Poslansia Ngudi Waluyo</span>
                    </div>
                    <p class="text-gray-400">
                        Memberikan pelayanan kesehatan terbaik untuk lansia dengan pendekatan holistik dan penuh kasih sayang.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                        <li><a href="#profil" class="text-gray-400 hover:text-white transition">Profil</a></li>
                        <li><a href="#visi" class="text-gray-400 hover:text-white transition">Visi Misi</a></li>
                        <li><a href="#kegiatan" class="text-gray-400 hover:text-white transition">Kegiatan</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Pemeriksaan Kesehatan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Konsultasi Dokter</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Senam Lansia</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Penyuluhan Kesehatan</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Sosial Media</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-sm font-semibold mb-2">Download Aplikasi</h4>
                        <div class="flex space-x-2">
                            <a href="#" class="bg-gray-800 text-white px-3 py-1 rounded text-sm flex items-center">
                                <i class="fab fa-google-play mr-1"></i> Play Store
                            </a>
                            <a href="#" class="bg-gray-800 text-white px-3 py-1 rounded text-sm flex items-center">
                                <i class="fab fa-apple mr-1"></i> App Store
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; 2025 Posyandu Lansia Ngudi Waluyo. All rights reserved. Make With ❤️
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>

</html>
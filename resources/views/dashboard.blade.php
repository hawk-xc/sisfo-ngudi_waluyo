<x-app-layout>
    @php
        $informations = [
            [
                'image' =>
                    'https://cdn.hellosehat.com/wp-content/uploads/2017/12/881bf088-perubahan-fisik-pada-lansia.jpg?w=1080&q=100',
                'title' => 'Hal yg perlu di perhatikan oleh pra lansia/lansia',
                'link' => 'https://hellosehat.com/lansia/perawatan-lansia/perubahan-tubuh-lansia/',
            ],
            [
                'image' =>
                    'https://blogs.insanmedika.co.id/wp-content/uploads/2019/12/Mencegah-dan-mengatasi-hipertensi-pada-lansia.jpg',
                'title' => 'Masalah Kesehatan (Hipertensi) Pada Pra-Lansia/Lansia',
                'link' => 'https://hellosehat.com/jantung/hipertensi/hipertensi-pada-lansia/',
            ],
            [
                'image' =>
                    'https://cdn.hellosehat.com/wp-content/uploads/2019/08/asian-doctor-talking-to-male-patient-700x467.jpg',
                'title' => 'Masalah kesehatan (diabetes mellitus) pada lansia',
                'link' => 'https://hellosehat.com/lansia/masalah-lansia/diabetes-pada-lansia/',
            ],
            [
                'image' =>
                    'https://res.cloudinary.com/dk0z4ums3/image/upload/v1665326538/attached_image/penyakit-paru-obstruktif-kronis-0-alodokter.jpg',
                'title' => 'Penyakit PPOK pada lansia',
                'link' => 'https://www.alodokter.com/penyakit-paru-obstruktif-kronis',
            ],
            [
                'image' =>
                    'https://cdn.hellosehat.com/wp-content/uploads/2021/03/b4e3320f-stroke-pada-lansia.jpg?w=1080&q=100',
                'title' => 'Penyakit Stroke pada lansia',
                'link' =>
                    'https://hellosehat.com/lansia/masalah-lansia/stroke-pada-lansia/#:~:text=Gejala%20stroke%20pada%20lansia%20meliputi,hidup%20untuk%20mencegah%20stroke%20berulang',
            ],
            [
                'image' =>
                    'https://mysiloam-api.siloamhospitals.com/public-asset/website-cms/website-cms-16729733804213650.webp',
                'title' => 'Asma bronkial pada lansia',
                'link' => 'https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-asma',
            ],
            [
                'image' =>
                    'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/06/06041418/Ini-Gejala-Jantung-Koroner-yang-Sering-Diabaikan.jpg',
                'title' => 'PJK pada Lansia',
                'link' =>
                    'https://www.halodoc.com/artikel/penyakit-jantung-koroner-rawan-dialami-lansia?srsltid=AfmBOooiiKIsO0Ukda0zqJ-W3TlBblNaEjoGkq2KBnydooH6EA8VczTj',
            ],
            [
                'image' =>
                    'https://d3uhejzrzvtlac.cloudfront.net/compro/articleMobile/166_0_mengenal-osteoporosis-gejala-pencegahan-dan-pengobatannya.jpg',
                'title' => 'Osteoporosis pada lansia',
                'link' => 'https://www.mitrakeluarga.com/artikel/osteoporosis-adalah',
            ],
            [
                'image' => 'https://d1bpj0tv6vfxyp.cloudfront.net/articles/873595_18-5-2021_10-18-37.webp',
                'title' => 'Arthritis pada lansia',
                'link' => 'https://www.halodoc.com/artikel/radang-sendi-pada-lansia-begini-cara-mengatasinya',
            ],
            [
                'image' =>
                    'https://cdn.hellosehat.com/wp-content/uploads/2021/03/141166be-gangguan-mental-pada-lansia.jpg',
                'title' => 'Gangguan mental pada lansia',
                'link' => 'https://hellosehat.com/lansia/mental-lansia/gangguan-kesehatan-mental-pada-lansia/',
            ],
            [
                'image' =>
                    'https://res.cloudinary.com/dk0z4ums3/image/upload/v1730442708/attached_image/demensia-0-alodokter.jpg',
                'title' => 'Penyakit Pikun pada lansia',
                'link' => 'https://www.alodokter.com/demensia',
            ],
            [
                'image' =>
                    'https://res.cloudinary.com/dk0z4ums3/image/upload/v1647234702/attached_image/menopause-0-alodokter.jpg',
                'title' => 'Menopause',
                'link' => 'https://www.alodokter.com/menopause',
            ],
            [
                'image' =>
                    'https://mysiloam-api.siloamhospitals.com/public-asset/website-cms/website-cms-16907943989093637.webp',
                'title' => 'Andropause',
                'link' => 'https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-andropause',
            ],
            [
                'title' => 'Gizi seimbang untuk lansia',
                'image' => 'https://www.nestlehealthscience.co.id/sites/default/files/inline-images/manula_0.jpg',
                'link' => 'https://www.nestlehealthscience.co.id/artikel/panduan-tips-gizi-lansia',
            ],
            [
                'title' => 'Gizi seimbang untuk lansia',
                'image' => 'https://bblabkesmasmakassar.go.id/wp-content/uploads/2023/02/PGS-600x750.jpg',
                'link' => 'https://bblabkesmasmakassar.go.id/pola-makan-sehat-dengan-tumpeng-gizi-seimbang/',
            ],
            [
                'title' => 'Gizi seimbang untuk lansia',
                'image' => 'https://ayosehat.kemkes.go.id/imagex/content/f835d6586a87cffec56dd2618ab49231.webp',
                'link' => 'https://ayosehat.kemkes.go.id/isi-piringku-pedoman-makan-kekinian-orang-indonesia',
            ],
            [
                'image' => 'https://img.youtube.com/vi/wN9aO40VsI0/maxresdefault.jpg',
                'title' => 'Video Senam Lansia',
                'link' => 'https://youtu.be/wN9aO40VsI0?si=IDCfr1OoWjgJIzBk',
            ],
            [
                'image' =>
                    'https://media.geriatri.id/img/article/1703040426-tips-untuk-lansia-yang-bepergian-agar-aman-dan-nyaman-lansia-wisata-di-taman-G.jpg',
                'title' => 'Tips saat melakukan perjalanan jauh untuk lansia',
                'link' => 'https://www.geriatri.id/artikel/1815/tips-untuk-lansia-yang-bepergian-agar-aman-dan-nyaman',
            ],
            [
                'image' => 'https://pbs.twimg.com/media/DK5EHUuVwAAyjHz.jpg',
                'title' => 'Peran Penting Keluarga terhadap perawatan lansia',
                'link' =>
                    'https://golantang.bkkbn.go.id/peran-keluarga-terhadap-perawatan-lansia#:~:text=Peran%20penting%20keluarga%20bagi%20lansia,Merawat%20lansia.',
            ],
        ];
    @endphp
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard Poslansia Ngudi Waluyo Banjarsari') }}
        </h2>
    </x-slot>
    @vite('resources/js/app.js')

    <div class="py-12">
        <div class="flex flex-col gap-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div id="dashboard-greet" class="max-w-full p-5 bg-white rounded-sm shadow-sm">
                <h1 class="text-2xl font-extrabold text-slate-700">Selamat datang, {{ auth()->user()->name }}</h1>
            </div>
            <div id="dashboard-card" class="flex flex-row w-full overflow-hidden md:gap-8 max-sm:gap-2 max-sm:p-2">
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Lansia</span>
                        <h1 class="text-3xl font-extrabold">{{ $metadata['lansia_count'] }}</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/lansia.png') }}" alt="lansia-logo"
                        class="w-20 ml-auto max-sm:hidden" />

                </div>
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Cek Kesehatan</span>
                        <h1 class="text-3xl font-extrabold">{{ $metadata['pemeriksaan_count'] }}</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/check.png') }}" alt="cek_kesehatan-logo"
                        class="w-20 ml-auto max-sm:hidden" />
                </div>
                @role('kader|admin')
                    <div class="dashboard-card">
                        <div class="dashboard-card-content">
                            <span class="text-sm text-gray-600">Total Penanggung Jawab</span>
                            <h1 class="text-3xl font-extrabold">{{ $metadata['user_count'] }}</h1>
                        </div>
                        <x-image src="{{ asset('assets/images/icons/pj.png') }}" alt="pj-logo"
                            class="w-20 ml-auto max-sm:hidden" />
                    </div>
                @endrole
            </div>
            <div id="dashboard-grafik" class="max-w-full p-5 bg-white rounded-sm shadow-sm">
                <h2 class="mb-5 text-xl font-semibold">Informasi Terbaru</h2>
                <div id="card-lists" class="flex flex-wrap gap-1 justify-evenly">
                    @foreach ($informations as $information)
                        <div class="mb-2 shadow-lg w-80 card bg-base-100">
                            <figure>
                                @if ($information['image'])
                                    <img src="{{ $information['image'] }}" alt="Shoes"
                                        class="w-full rounded-lg h-44 image-full" />
                                @else
                                    <iframe width="100%" height="250" src="{{ $information['youtube'] }}"
                                        frameborder="0" allowfullscreen></iframe>
                                @endif
                            </figure>
                            <div class="card-body">
                                <a href="{{ $information['link'] }}" target="_blank">
                                    <h2 class="cursor-pointer card-title hover:underline">
                                        {{ $information['title'] }}
                                    </h2>
                                </a>
                                <div class="justify-end card-actions">
                                    <div class="badge badge-outline">Artikel</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.clickable-link').forEach(function(span) {
                    span.addEventListener('click', function() {
                        window.open(this.getAttribute('data-url'), '_blank');
                    });
                });
            });
        </script>

        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    </div>
</x-app-layout>

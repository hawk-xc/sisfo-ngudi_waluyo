<x-app-layout>
    @php
        $informations = [
            [
                'title' => 'Hal yg perlu di perhatikan oleh pra lansia/lansia',
                'link' => ['https://hellosehat.com/lansia/perawatan-lansia/perubahan-tubuh-lansia/'],
            ],
            [
                'title' => 'Masalah Kesehatan (Hipertensi) Pada Pra-Lansia/Lansia',
                'link' => ['https://hellosehat.com/jantung/hipertensi/hipertensi-pada-lansia/'],
            ],
            [
                'title' => 'Masalah kesehatan (diabetes mellitus) pada lansia',
                'link' => ['https://hellosehat.com/lansia/masalah-lansia/diabetes-pada-lansia/'],
            ],
            [
                'title' => 'Penyakit PPOK pada lansia',
                'link' => ['https://www.alodokter.com/penyakit-paru-obstruktif-kronis'],
            ],
            [
                'title' => 'Penyakit Stroke pada lansia',
                'link' => [
                    'https://hellosehat.com/lansia/masalah-lansia/stroke-pada-lansia/#:~:text=Gejala%20stroke%20pada%20lansia%20meliputi,hidup%20untuk%20mencegah%20stroke%20berulang',
                ],
            ],
            [
                'title' => 'Asma bronkial pada lansia',
                'link' => ['https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-asma'],
            ],
            [
                'title' => 'PJK pada Lansia',
                'link' => [
                    'https://www.halodoc.com/artikel/penyakit-jantung-koroner-rawan-dialami-lansia?srsltid=AfmBOooiiKIsO0Ukda0zqJ-W3TlBblNaEjoGkq2KBnydooH6EA8VczTj',
                ],
            ],
            [
                'title' => 'Osteoporosis pada lansia',
                'link' => ['https://www.mitrakeluarga.com/artikel/osteoporosis-adalah'],
            ],
            [
                'title' => 'Arthritis pada lansia',
                'link' => ['https://www.halodoc.com/artikel/radang-sendi-pada-lansia-begini-cara-mengatasinya'],
            ],
            [
                'title' => 'Gangguan mental pada lansia',
                'link' => ['https://hellosehat.com/lansia/mental-lansia/gangguan-kesehatan-mental-pada-lansia/'],
            ],
            [
                'title' => 'Penyakit Pikun pada lansia',
                'link' => ['https://www.alodokter.com/demensia'],
            ],
            [
                'title' => 'Menopause',
                'link' => ['https://www.alodokter.com/menopause'],
            ],
            [
                'title' => 'Andropause',
                'link' => ['https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-andropause'],
            ],
            [
                'title' => 'Gizi seimbang untuk lansia',
                'link' => [
                    'https://www.nestlehealthscience.co.id/artikel/panduan-tips-gizi-lansia',
                    'https://bblabkesmasmakassar.go.id/pola-makan-sehat-dengan-tumpeng-gizi-seimbang/',
                    'https://ayosehat.kemkes.go.id/isi-piringku-pedoman-makan-kekinian-orang-indonesia',
                ],
            ],
            [
                'title' => 'Video Senam Lansia',
                'link' => ['https://youtu.be/wN9aO40VsI0?si=IDCfr1OoWjgJIzBk'],
            ],
            [
                'title' => 'Tips saat melakukan perjalanan jauh untuk lansia',
                'link' => [
                    'https://www.geriatri.id/artikel/1815/tips-untuk-lansia-yang-bepergian-agar-aman-dan-nyaman',
                ],
            ],
            [
                'title' => 'Peran Penting Keluarga terhadap perawatan lansia',
                'link' => [
                    'https://golantang.bkkbn.go.id/peran-keluarga-terhadap-perawatan-lansia#:~:text=Peran%20penting%20keluarga%20bagi%20lansia,Merawat%20lansia.',
                ],
            ],
        ];
    @endphp
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard Poslansia Ngudi Waluyo Banjarsari') }}
            {{-- @dd(request()->route()->uri); --}}
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
                <h2 class="mb-3 text-xl font-semibold">Informasi Terbaru</h2>
                <div id="card-lists" class="flex flex-wrap gap-2">
                    @foreach ($informations as $information)
                        <div tabindex="0" class="border collapse collapse-plus bg-base-100 border-base-300">
                            <div class="font-semibold collapse-title">{{ $information['title'] }}</div>
                            <div class="flex flex-col gap-1 text-sm collapse-content link-container">
                                @foreach ($information['link'] as $link)
                                    <span class="cursor-pointer text-sky-500 hover:underline clickable-link"
                                        data-url="{{ $link }}">
                                        {{ $link }}
                                    </span>
                                @endforeach
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

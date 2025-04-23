<x-app-layout>
    @php
        $posyandu_data = [
            [
                'title' => 'Data Pemeriksaan',
                'description' => 'Data pemeriksaan yang dilakukan di posyandu.',
                'uri' => 'laporan.data.pemeriksaan',
                'name' => 'ri-stethoscope-line',
            ],
            [
                'title' => 'Data Lansia',
                'description' => 'Data lansia yang terdaftar di posyandu.',
                'uri' => 'laporan.data.lansia',
                'name' => 'ri-group-line',
            ],
            [
                'title' => 'Data Penanggung Jawab',
                'description' => 'Data penanggung jawab yang terdaftar di posyandu.',
                'uri' => 'laporan.data.pj',
                'name' => 'ri-user-settings-line',
            ],
            [
                'title' => 'Data Kader',
                'description' => 'Data kader yang terdaftar di posyandu.',
                'uri' => 'laporan.data.kader',
                'name' => 'ri-user-follow-line',
            ],
        ];
    @endphp
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pusat Gizi') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                callToast('success', '{{ session('success') }}')
            })
        </script>
    @elseif (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                callToast('error', '{{ session('error') }}')
            })
        </script>
    @endif

    <div class="px-4 py-12 md:px-0">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 p-5 mb-4 bg-white shadow-sm">
                <h1 class="text-xl font-semibold">Halaman Pelaporan data Poslansia</h1>
                <span class="mb-10 text-gray-500">
                    Halaman ini digunakan untuk pelaporan. Harap memilih data yang sesuai untuk menampilkan
                    data terkait.
                </span>
                <div id="card-data-content" class="flex flex-row gap-4">
                    @foreach ($posyandu_data as $data)
                        <a href="{{ route($data['uri']) }}">
                            <div id="card-data"
                                class="p-5 duration-150 bg-blue-100 rounded-md shadow-md hover:brightness-95">
                                <h4 class="text-lg font-semibold">
                                    <i class="{{ $data['name'] }}"></i>
                                    {{ $data['title'] }}
                                </h4>
                                <span class="text-sm">
                                    {{ $data['description'] }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>

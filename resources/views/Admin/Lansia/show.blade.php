<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Detail Data Lansia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="ri-user-3-fill text-blue-500 mr-2"></i> Informasi Lansia
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 font-medium">Nama:</p>
                        <p class="text-lg font-semibold">{{ $lansia->nama }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-medium">NIK:</p>
                        <p class="text-lg font-semibold">{{ $lansia->nik }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-medium">Alamat:</p>
                        <p class="text-lg font-semibold">{{ $lansia->alamat }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-medium">Usia:</p>
                        <p class="text-lg font-semibold">{{ $lansia->umur }} Tahun</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-medium">Jenis Kelamin:</p>
                        <p class="text-lg font-semibold">{{ $lansia->jenis_kelamin }}</p>
                    </div>
                </div>

                <hr class="my-6 border-gray-300">

                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="ri-shield-user-line text-green-500 mr-2"></i> Penanggung Jawab
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 font-medium">Nama PJ:</p>
                        <p class="text-lg font-semibold">{{ $lansia->pj_nama }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-medium">Email PJ:</p>
                        <p class="text-lg font-semibold">{{ $lansia->pj_email }}</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('lansia.index') }}" class="btn btn-outline btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

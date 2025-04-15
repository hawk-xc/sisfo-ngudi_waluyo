<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Detail Data Lansia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="flex items-center mb-4 text-2xl font-semibold text-gray-800">
                    <i class="mr-2 text-blue-500 ri-user-3-fill"></i> Informasi Lansia
                </h3>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <p class="font-medium text-gray-600">Nama:</p>
                        <p class="text-lg font-semibold">{{ $lansia->nama }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">NIK:</p>
                        <p class="text-lg font-semibold">{{ $lansia->nik }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Alamat:</p>
                        <p class="text-lg font-semibold">{{ $lansia->alamat }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Usia:</p>
                        <p class="text-lg font-semibold">{{ $lansia->umur }} Tahun</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Jenis Kelamin:</p>
                        <p class="text-lg font-semibold">{{ $lansia->jenis_kelamin }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Status Perkawinan:</p>
                        <p class="text-lg font-semibold">{{ $lansia->status_perkawinan }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Agama:</p>
                        <p class="text-lg font-semibold">{{ $lansia->agama }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Pendidikan Terakhir:</p>
                        <p class="text-lg font-semibold">{{ $lansia->pendidikan_terakhir }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Riwayat Kesehatan:</p>
                        <p class="text-lg font-semibold">{{ $lansia->riwayat_kesehatan }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Golongan Darah:</p>
                        <p class="text-lg font-semibold">{{ $lansia->golongan_darah }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Rhesus:</p>
                        <p class="text-lg font-semibold">{{ $lansia->rhesus }}</p>
                    </div>
                </div>

                <hr class="my-6 border-gray-300">

                <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                    <i class="mr-2 text-green-500 ri-shield-user-line"></i> Penanggung Jawab
                </h3>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <p class="font-medium text-gray-600">Nama PJ:</p>
                        <p class="text-lg font-semibold">{{ $lansia->pj_nama }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">Email PJ:</p>
                        <p class="text-lg font-semibold">{{ $lansia->pj_email }}</p>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <a href="{{ route('lansia.index') }}" class="btn btn-outline btn-secondary">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

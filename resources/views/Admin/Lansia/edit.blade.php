<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Data Lansia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="ri-edit-2-fill text-yellow-500 mr-2"></i> Form Edit Lansia
                </h3>

                <form action="{{ route('lansia.update', $lansia->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-gray-600 font-medium">Nama:</label>
                            <input type="text" name="nama" value="{{ $lansia->nama }}" class="w-full input input-bordered" required>
                        </div>
                        <div>
                            <label class="text-gray-600 font-medium">NIK:</label>
                            <input type="text" name="nik" value="{{ $lansia->nik }}" class="w-full input input-bordered" required>
                        </div>
                        <div>
                            <label class="text-gray-600 font-medium">Alamat:</label>
                            <input type="text" name="alamat" value="{{ $lansia->alamat }}" class="w-full input input-bordered" required>
                        </div>
                        <div>
                            <label class="text-gray-600 font-medium">Usia:</label>
                            <input type="number" name="umur" value="{{ $lansia->umur }}" class="w-full input input-bordered" required>
                        </div>
                        <div>
                            <label class="text-gray-600 font-medium">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" class="w-full input input-bordered" required>
                                <option value="Laki-laki" {{ $lansia->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $lansia->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-6 border-gray-300">

                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="ri-shield-user-line text-green-500 mr-2"></i> Edit Penanggung Jawab
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-gray-600 font-medium">Nama PJ:</label>
                            <input type="text" name="pj_nama" value="{{ $lansia->pj_nama }}" class="w-full input input-bordered" required>
                        </div>
                        <div>
                            <label class="text-gray-600 font-medium">Email PJ:</label>
                            <input type="email" name="pj_email" value="{{ $lansia->pj_email }}" class="w-full input input-bordered" required>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('lansia.index') }}" class="btn btn-outline btn-secondary">
                            <i class="ri-arrow-left-line"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="ri-save-line"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

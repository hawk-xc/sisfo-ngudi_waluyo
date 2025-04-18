<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Data Lansia
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="flex items-center mb-4 text-2xl font-semibold text-gray-800">
                    <i class="mr-2 text-yellow-500 ri-edit-2-fill"></i> Form Edit Lansia
                </h3>

                <form action="{{ route('lansia.update', $lansia->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="font-medium text-gray-600">Nama:</label>
                            <input type="text" name="nama" value="{{ old('nama', $lansia->nama) }}"
                                class="w-full input input-bordered" required>
                            @error('nama')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full input input-bordered"
                                value="{{ old('tanggal_lahir', $lansia->tanggal_lahir) }}" required>
                            @error('tanggal_lahir')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="font-medium text-gray-600">NIK:</label>
                            <input type="text" name="nik" value="{{ old('nik', $lansia->nik) }}"
                                class="w-full input input-bordered" required>
                            @error('nik')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label class="font-medium text-gray-600">Alamat:</label>
                            <textarea name="alamat" class="w-full input input-bordered" rows="3" required>{{ old('alamat', $lansia->alamat) }}</textarea>
                            @error('alamat')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="font-medium text-gray-600">Usia:</label>
                            <input type="number" name="umur" value="{{ old('umur', $lansia->umur) }}"
                                class="w-full input input-bordered" required>
                            @error('umur')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="font-medium text-gray-600">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" class="w-full input input-bordered" required>
                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $lansia->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $lansia->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Status Perkawinan</label>
                            <select name="status_perkawinan" class="w-full select select-bordered">
                                <option value="">-- Pilih Status --</option>
                                <option value="Belum Menikah"
                                    {{ old('status_perkawinan', $lansia->status_perkawinan) == 'Belum Menikah' ? 'selected' : '' }}>
                                    Belum Menikah</option>
                                <option value="Menikah"
                                    {{ old('status_perkawinan', $lansia->status_perkawinan) == 'Menikah' ? 'selected' : '' }}>
                                    Menikah</option>
                                <option value="Cerai"
                                    {{ old('status_perkawinan', $lansia->status_perkawinan) == 'Cerai' ? 'selected' : '' }}>
                                    Cerai</option>
                            </select>
                            @error('status_perkawinan')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Agama</label>
                            <select name="agama" class="w-full select select-bordered">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam" {{ old('agama', $lansia->agama) == 'Islam' ? 'selected' : '' }}>
                                    Islam</option>
                                <option value="Kristen"
                                    {{ old('agama', $lansia->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik"
                                    {{ old('agama', $lansia->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama', $lansia->agama) == 'Hindu' ? 'selected' : '' }}>
                                    Hindu</option>
                                <option value="Buddha"
                                    {{ old('agama', $lansia->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu"
                                    {{ old('agama', $lansia->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                </option>
                            </select>
                            @error('agama')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Golongan Darah</label>
                            <select name="golongan_darah" class="w-full select select-bordered">
                                <option value="">-- Pilih Golongan Darah --</option>
                                <option value="A"
                                    {{ old('golongan_darah', $lansia->golongan_darah) == 'A' ? 'selected' : '' }}>A
                                </option>
                                <option value="B"
                                    {{ old('golongan_darah', $lansia->golongan_darah) == 'B' ? 'selected' : '' }}>B
                                </option>
                                <option value="AB"
                                    {{ old('golongan_darah', $lansia->golongan_darah) == 'AB' ? 'selected' : '' }}>AB
                                </option>
                                <option value="O"
                                    {{ old('golongan_darah', $lansia->golongan_darah) == 'O' ? 'selected' : '' }}>O
                                </option>
                            </select>
                            @error('golongan_darah')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Rhesus</label>
                            <select name="rhesus" class="w-full select select-bordered">
                                <option value="">-- Pilih Rhesus --</option>
                                <option value="Positif"
                                    {{ old('rhesus', $lansia->rhesus) == 'Positif' ? 'selected' : '' }}>Positif
                                </option>
                                <option value="Negatif"
                                    {{ old('rhesus', $lansia->rhesus) == 'Negatif' ? 'selected' : '' }}>Negatif
                                </option>
                            </select>
                            @error('rhesus')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" class="w-full input input-bordered"
                                value="{{ old('pendidikan_terakhir', $lansia->pendidikan_terakhir) }}">
                            @error('pendidikan_terakhir')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Riwayat Kesehatan</label>
                            <textarea name="riwayat_kesehatan" class="w-full textarea textarea-bordered">{{ $lansia->riwayat_kesehatan }}</textarea>
                            @error('riwayat_kesehatan')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-6 border-gray-300">

                    <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                        <i class="mr-2 text-green-500 ri-shield-user-line"></i> Edit Penanggung Jawab
                    </h3>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="font-medium text-gray-600">Nama PJ:</label>
                            <input type="text" name="pj_nama" value="{{ old('pj_nama', $lansia->pj_nama) }}"
                                class="w-full input input-bordered" required>
                            @error('pj_nama')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="font-medium text-gray-600">Email PJ:</label>
                            <input type="email" name="pj_email" value="{{ old('pj_email', $lansia->pj_email) }}"
                                class="w-full input input-bordered" required>
                            @error('pj_email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col justify-end mt-6 space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3">
                        <a href="{{ route('lansia.index') }}"
                            class="flex items-center justify-center btn btn-outline btn-secondary">
                            <i class="mr-2 ri-arrow-left-line"></i> Batal
                        </a>
                        <button type="submit" class="flex items-center justify-center btn btn-primary">
                            <i class="mr-2 ri-save-line"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

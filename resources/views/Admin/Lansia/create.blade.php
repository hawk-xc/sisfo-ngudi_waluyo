<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Data Lansia & Akun PJ') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Form Tambah Lansia -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Data Lansia</h3>
                        <form method="POST" action="{{ route('lansia.store') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium">NIK</label>
                                <input type="text" name="nik" class="input input-bordered w-full" value="{{ old('nik') }}" required>
                                @error('nik')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Nama</label>
                                <input type="text" name="nama" class="input input-bordered w-full" value="{{ old('nama') }}" required>
                                @error('nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Alamat</label>
                                <input type="text" name="alamat" class="input input-bordered w-full" value="{{ old('alamat') }}" required>
                                @error('alamat')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Usia</label>
                                <input type="number" name="umur" class="input input-bordered w-full" value="{{ old('umur') }}" required>
                                @error('umur')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="select select-bordered w-full" required>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <!-- Tambahan Field Sesuai Schema -->
                            <div>
                                <label class="block text-sm font-medium">Status Perkawinan</label>
                                <select name="status_perkawinan" class="select select-bordered w-full">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Cerai">Cerai</option>
                                </select>
                                @error('status_perkawinan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Agama</label>
                                <select name="agama" class="select select-bordered w-full">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                @error('agama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan_terakhir" class="input input-bordered w-full">
                                @error('pendidikan_terakhir')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Golongan Darah</label>
                                <select name="golongan_darah" class="select select-bordered w-full">
                                    <option value="">-- Pilih Golongan Darah --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                                @error('golongan_darah')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Rhesus</label>
                                <select name="rhesus" class="select select-bordered w-full">
                                    <option value="">-- Pilih Rhesus --</option>
                                    <option value="Positif">Positif</option>
                                    <option value="Negatif">Negatif</option>
                                </select>
                                @error('rhesus')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Riwayat Kesehatan</label>
                                <textarea name="riwayat_kesehatan" class="textarea textarea-bordered w-full"></textarea>
                                @error('riwayat_kesehatan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                    </div>

                    <!-- Form Tambah Akun PJ -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Data Akun PJ</h3>
                        <div>
                            <label class="block text-sm font-medium">Pilih Akun PJ</label>
                            <select name="pj_id" id="pj_id" class="select select-bordered w-full">
                                <option value="">-- Pilih Akun PJ yang Sudah Ada --</option>
                                @foreach ($pjs as $pj)
                                    <option value="{{ $pj->id }}">{{ $pj->name }} - {{ $pj->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Atau buat akun PJ baru:</p>
                        <div>
                            <label class="block text-sm font-medium">Nama PJ</label>
                            <input type="text" name="pj_nama" class="input input-bordered w-full">
                            @error('pj_nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Email PJ</label>
                            <input type="email" name="pj_email" class="input input-bordered w-full">
                            @error('pj_email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Password default: <b>password123</b></p>
                        </div>
                        <button type="submit" class="btn btn-primary w-full">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

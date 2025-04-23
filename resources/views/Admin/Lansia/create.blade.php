<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Data Lansia & Akun PJ') }}
        </h2>
    </x-slot>

    <div class="px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="flex items-center mb-4 text-2xl font-semibold text-gray-800">
                    <i class="mr-2 text-yellow-500 ri-edit-2-fill"></i> Form Tambah Lansia
                </h3>

                <form action="{{ route('lansia.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('POST')

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Form Tambah Lansia -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="font-medium text-gray-600">Nama</label>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="w-full input input-bordered" required>
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="w-full input input-bordered"
                                    value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="font-medium text-gray-600">NIK:</label>
                                <input type="text" name="nik" value="{{ old('nik') }}"
                                    class="w-full input input-bordered" required>
                                @error('nik')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Kewarganegaraan</label>
                                <select name="kewarganegaraan" class="w-full select select-bordered">
                                    <option value="">-- Pilih Kewarganegaraan --</option>
                                    <option value="Indonesia"
                                        {{ old('kewarganegaraan') == 'Indonesia' ? 'selected' : '' }}>
                                        Indonesia</option>
                                    <option value="Asing" {{ old('kewarganegaraan') == 'Asing' ? 'selected' : '' }}>
                                        Asing</option>
                                </select>
                                @error('kewarganegaraan')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label class="font-medium text-gray-600">Alamat:</label>
                                <textarea name="alamat" class="w-full input input-bordered" rows="3" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div>
                            <label class="font-medium text-gray-600">Usia:</label>
                            <input type="number" name="umur" value="{{ old('umur') }}"
                                class="w-full input input-bordered" required>
                            @error('umur')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>   --}}
                            <div>
                                <label class="block text-sm font-medium">Pendidikan Terakhir</label>
                                <select name="pendidikan_terakhir" class="w-full select select-bordered">
                                    <option value="">-- Pendidikan Terakhir --</option>
                                    <option value="SD" {{ old('pendidikan_terakhir') == 'SD' ? 'selected' : '' }}>
                                        SD</option>
                                    <option value="SLTP/sederajat"
                                        {{ old('pendidikan_terakhir') == 'SLTP/sederajat' ? 'selected' : '' }}>
                                        SLTP/sederajat</option>
                                    <option value="SLTA/sederajat"
                                        {{ old('pendidikan_terakhir') == 'SLTA/sederajat' ? 'selected' : '' }}>
                                        SLTA/sederajat</option>
                                    <option value="D1" {{ old('pendidikan_terakhir') == 'D1' ? 'selected' : '' }}>
                                        D1</option>
                                    <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>
                                        D3</option>
                                    <option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>
                                        S1</option>
                                    <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>
                                        S2</option>
                                    <option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>
                                        S3</option>
                                </select>
                                @error('status_perkawinan')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="font-medium text-gray-600">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" class="w-full input input-bordered" required>
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
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
                                        {{ old('status_perkawinan') == 'Belum Menikah' ? 'selected' : '' }}>
                                        Belum Menikah</option>
                                    <option value="Menikah"
                                        {{ old('status_perkawinan') == 'Menikah' ? 'selected' : '' }}>
                                        Menikah</option>
                                    <option value="Cerai" {{ old('status_perkawinan') == 'Cerai' ? 'selected' : '' }}>
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
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>
                                        Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>
                                        Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha
                                    </option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu
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
                                    <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB
                                    </option>
                                    <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O
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
                                    <option value="Positif" {{ old('rhesus') == 'Positif' ? 'selected' : '' }}>Positif
                                    </option>
                                    <option value="Negatif" {{ old('rhesus') == 'Negatif' ? 'selected' : '' }}>Negatif
                                    </option>
                                </select>
                                @error('rhesus')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Pekerjaan</label>
                                <select name="pekerjaan" class="w-full select select-bordered">
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    <option value="Buruh" {{ old('pekerjaan') == 'Buruh' ? 'selected' : '' }}>
                                        Buruh</option>
                                    <option value="Guru" {{ old('pekerjaan') == 'Guru' ? 'selected' : '' }}>
                                        Guru</option>
                                    <option value="Karyawan Swasta"
                                        {{ old('pekerjaan') == 'Karyawan Swasta' ? 'selected' : '' }}>
                                        Karyawan Swasta</option>
                                    <option value="Pensiunan" {{ old('pekerjaan') == 'Pensiunan' ? 'selected' : '' }}>
                                        Pensiunan</option>
                                    <option value="Petani" {{ old('pekerjaan') == 'Petani' ? 'selected' : '' }}>
                                        Petani</option>
                                    <option value="Pegawai Negeri Sipil"
                                        {{ old('pekerjaan') == 'Pegawai Negeri Sipil' ? 'selected' : '' }}>
                                        Pegawai Negeri Sipil</option>
                                    <option value="Tidak bekerja"
                                        {{ old('pekerjaan') == 'Tidak bekerja' ? 'selected' : '' }}>
                                        Tidak bekerja</option>
                                    <option value="Wiraswasta"
                                        {{ old('pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>
                                        Wiraswasta</option>
                                </select>
                                @error('agama')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Suku</label>
                                <select name="suku" class="w-full select select-bordered">
                                    <option value="">-- Pilih Suku --</option>
                                    <option value="Batak" {{ old('suku') == 'Batak' ? 'selected' : '' }}>
                                        Batak</option>
                                    <option value="Betawi" {{ old('suku') == 'Betawi' ? 'selected' : '' }}>
                                        Betawi</option>
                                    <option value="Jawa" {{ old('suku') == 'Jawa' ? 'selected' : '' }}>
                                        Jawa</option>
                                    <option value="Madura" {{ old('suku') == 'Madura' ? 'selected' : '' }}>
                                        Madura</option>
                                    <option value="Melayu" {{ old('suku') == 'Melayu' ? 'selected' : '' }}>
                                        Melayu</option>
                                </select>
                                @error('status_perkawinan')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label class="font-medium text-gray-600">Alamat:</label>
                                <textarea name="riwayat_kesehatan" class="w-full h-16 input input-bordered" rows="3" required>{{ old('riwayat_kesehatan') }}</textarea>
                                @error('riwayat_kesehatan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Tambah Akun PJ -->
                        <div>
                            <h3 class="mb-4 text-lg font-semibold">Data Akun PJ</h3>
                            <div>
                                <label class="block text-sm font-medium">Pilih Akun PJ</label>
                                <select name="pj_id" id="pj_id" class="w-full select select-bordered">
                                    <option value="">-- Pilih Akun PJ yang Sudah Ada --</option>
                                    @foreach ($pjs as $pj)
                                        <option value="{{ $pj->id }}">{{ $pj->name }} -
                                            {{ $pj->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <p class="mt-2 text-sm text-gray-500">Atau buat akun PJ baru:</p>
                        <div>
                            <label class="block text-sm font-medium">Nama PJ</label>
                            <input type="text" name="pj_nama" class="w-full input input-bordered">
                            @error('pj_nama')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Email PJ</label>
                            <input type="email" name="pj_email" class="w-full input input-bordered">
                            @error('pj_email')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Password default: <b>password123</b></p>
                        </div> --}}
                            <button type="submit" class="w-full mt-9 btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>

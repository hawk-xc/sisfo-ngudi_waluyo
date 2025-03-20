<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Data Lansia & Akun PJ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Form Tambah Lansia -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Data Lansia</h3>
                        <form method="POST" action="{{ route('lansia.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm font-medium">NIK</label>
                                <input type="text" name="nik" class="input input-bordered w-full" value="{{ old('nik') }}" required>
                                @error('nik')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Nama</label>
                                <input type="text" name="nama" class="input input-bordered w-full" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Alamat</label>
                                <input type="text" name="alamat" class="input input-bordered w-full" value="{{ old('alamat') }}" required>
                                @error('alamat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Usia</label>
                                <input type="number" name="umur" class="input input-bordered w-full" value="{{ old('umur') }}" required>
                                @error('umur')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="select select-bordered w-full" required>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                    </div>

                    <!-- Form Tambah Akun PJ -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Data Akun PJ</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Pilih Akun PJ</label>
                            <select name="pj_id" id="pj_id" class="select select-bordered w-full">
                                <option value="">-- Pilih Akun PJ yang Sudah Ada --</option>
                                @foreach ($pjs as $pj)
                                    <option value="{{ $pj->id }}">{{ $pj->name }} - {{ $pj->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <p class="text-sm text-gray-500 mb-2">Atau buat akun PJ baru:</p>

                        <div class="mb-4">
                            <label class="block text-sm font-medium">Nama PJ</label>
                            <input type="text" name="pj_nama" class="input input-bordered w-full">
                            @error('pj_nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Email PJ</label>
                            <input type="email" name="pj_email" class="input input-bordered w-full">
                            @error('pj_email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
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

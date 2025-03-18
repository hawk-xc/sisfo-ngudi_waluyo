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
                                <input type="text" name="nik" class="input input-bordered w-full" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Nama</label>
                                <input type="text" name="nama" class="input input-bordered w-full" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Alamat</label>
                                <input type="text" name="alamat" class="input input-bordered w-full" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Usia</label>
                                <input type="number" name="umur" class="input input-bordered w-full" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="select select-bordered w-full" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            {{-- <div class="mb-4">
                                <label class="block text-sm font-medium">Posyandu</label>
                                <select name="posyandu_id" class="select select-bordered w-full" required>
                                    @foreach ($posyandus as $posyandu)
                                        <option value="{{ $posyandu->id }}">{{ $posyandu->nama }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                    </div>

                    <!-- Form Tambah Akun PJ -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Data Akun PJ</h3>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Nama PJ</label>
                                <input type="text" name="pj_nama" class="input input-bordered w-full" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium">Email PJ</label>
                                <input type="email" name="pj_email" class="input input-bordered w-full" required>
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

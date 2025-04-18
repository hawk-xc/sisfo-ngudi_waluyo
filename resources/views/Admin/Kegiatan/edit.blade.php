<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Ubah data Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <h1 class="text-2xl font-extrabold">Tambah Daftar kegiatan</h1>
                        <div class="flex justify-end w-full">
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline btn-neutral btn-sm"><i
                                    class="ri-arrow-left-long-line"></i>
                                Kembali ke halaman Kegiatan</a>
                        </div>
                        <form action="{{ route('kegiatan.update', $kegiatan->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div action="" class="flex flex-row w-full gap-2 p-5">
                                <div id="gambar" class="flex-1">
                                    <div id="gambar-kegiatan" class="px-5 mb-3">
                                        <img id="preview-gambar" src="{{ asset('storage/' . $kegiatan->gambar) }}"
                                            alt="Preview Gambar" style="{{ $kegiatan->gambar ? '' : 'display: none;' }}"
                                            class="max-w-full" />
                                    </div>
                                    <label for="gambar-input" class="my-2">
                                        Gambar Kegiatan
                                    </label>
                                    <fieldset class="fieldset">
                                        <input type="file" id="gambar-input" class="file-input" name="gambar"
                                            accept="image/*" />
                                        <label class="fieldset-label">Format yang didukung .png, .jpg, .jpeg</label>
                                    </fieldset>
                                </div>
                                <div id="form" class="flex flex-col flex-1 gap-3">
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="nama_kegiatan">Nama Kegiatan</label>
                                        <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                            placeholder="Nama Kegiatan" class="w-full input"
                                            value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan ?? '') }}">
                                    </div>
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                        <input type="datetime-local" name="tanggal_kegiatan"
                                            value="{{ old('name', $kegiatan->tanggal_kegiatan ?? '') }}"
                                            id="tanggal_kegiatan" class="w-full input">
                                    </div>
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" class="w-full textarea" id="keterangan" cols="30" rows="10"
                                            placeholder="Deskripsi Kegiatan...">{{ old('name', $kegiatan->keterangan ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end w-full gap-5">
                                <button id="resetButton"
                                    class="text-red-500 cursor-pointer hover:text-red-600 hover:underline"
                                    type="reset">reset</button>
                                <button type="submit" class="btn btn-sm btn-outline btn-primary">
                                    Simpan Kegiatan
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('gambar-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview-gambar');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Hapus gambar saat tombol reset ditekan
        document.getElementById('resetButton').addEventListener('click', function() {
            const preview = document.getElementById('preview-gambar');
            const fileInput = document.getElementById('gambar-input');

            preview.src = ""; // Kosongkan gambar
            preview.style.display = "none"; // Sembunyikan gambar
            fileInput.value = ""; // Reset input file
        });
    </script>
</x-app-layout>

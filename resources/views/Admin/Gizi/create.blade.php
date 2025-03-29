<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Data Gizi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <div class="flex justify-end w-full">
                            <a href="{{ route('gizi.index') }}" class="btn btn-outline btn-neutral btn-sm"><i
                                    class="ri-arrow-left-long-line"></i>
                                Kembali ke halaman gizi</a>
                        </div>
                        <form action="{{ route('gizi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div action="" class="flex flex-row w-full gap-2 p-5">
                                <div id="gambar" class="flex-1">
                                    <div id="gambar-gizi" class="px-5 mb-3">
                                        <img id="preview-gambar" src="" alt="Preview Gambar"
                                            style="display: none;" class="max-w-full" />
                                    </div>
                                    <label for="gambar-input" class="my-2">
                                        Gambar Gizi
                                    </label>
                                    <fieldset class="fieldset">
                                        <input type="file" id="gambar-input"
                                            class="file-input {{ $errors->has('gambar') ? 'file-input-error' : '' }}"
                                            name="gambar" accept="image/*" />
                                        <label
                                            class="fieldset-label {{ $errors->has('gambar') ? 'text-error font-extrabold' : '' }}">Format
                                            yang didukung .png, .jpg, .jpeg</label>
                                    </fieldset>
                                </div>
                                <div id="form" class="flex flex-col flex-1">
                                    <div class="flex flex-col gap-1 p-2">
                                        <label for="jenis_gizi">Jenis gizi</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="jenis_gizi" id="jenis_gizi"
                                                placeholder="Nama gizi"
                                                class="w-full input {{ $errors->has('jenis_gizi') ? 'input-error' : '' }}"
                                                value="{{ old('jenis_gizi') }}">
                                            @if ($errors->first('jenis_gizi'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('jenis_gizi') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    {{-- menu_gizi --}}
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="nama_gizi">Menu</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="menu_gizi" id="menu_gizi"
                                                placeholder="Menu Gizi"
                                                class="w-full input {{ $errors->has('menu_gizi') ? 'input-error' : '' }}"
                                                value="{{ old('menu_gizi') }}">
                                            @if ($errors->first('menu_gizi'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('menu_gizi') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    {{-- bahan_makanan --}}
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="bahan_makanan">Bahan Makanan</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="bahan_makanan" id="bahan_makanan"
                                                placeholder="Bahan Makanan"
                                                class="w-full input {{ $errors->has('bahan_makanan') ? 'input-error' : '' }}"
                                                value="{{ old('bahan_makanan') }}">
                                            @if ($errors->first('bahan_makanan'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('bahan_makanan') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    {{-- berat --}}
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="berat">berat</label>
                                        <fieldset class="fieldset">
                                            <label class="w-full input">
                                                Kg
                                                <input type="number" placeholder="berat" step="0.1"
                                                    class="grow w-full input {{ $errors->has('berat') ? 'input-error' : '' }}"
                                                    value="{{ old('berat') }}" name="berat" />
                                            </label>
                                            @if ($errors->first('berat'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('berat') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    {{-- url --}}
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="urt" class="uppercase">urt</label>
                                        <fieldset class="fieldset">
                                            <label class="w-full input">
                                                Kg
                                                <input type="number" placeholder="URT" name="urt" step="0.1"
                                                    class="grow w-full input {{ $errors->has('urt') ? 'input-error' : '' }}"
                                                    value="{{ old('urt') }}" />
                                            </label>
                                            @if ($errors->first('urt'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('urt') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    {{-- harga --}}
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="harga">Harga</label>
                                        <fieldset class="fieldset">
                                            <label class="w-full input">
                                                Rp
                                                <input type="text" placeholder="Harga Gizi" name="harga"
                                                    class="grow w-full input {{ $errors->has('harga') ? 'input-error' : '' }}"
                                                    value="{{ old('harga') }}" oninput="formatRupiah(this)" />
                                            </label>
                                            @if ($errors->first('harga'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('harga') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>

                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="keterangan">Keterangan</label>
                                        <fieldset class="fieldset">
                                            <textarea name="keterangan" class="w-full textarea {{ $errors->has('keterangan') ? 'textarea-error' : '' }}"
                                                id="keterangan" cols="30" rows="10" placeholder="Keterangan gizi...">{{ old('keterangan') }}</textarea>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end w-full gap-5">
                                <button id="resetButton"
                                    class="text-red-500 cursor-pointer hover:text-red-600 hover:underline"
                                    type="reset">reset</button>
                                <button type="submit" class="btn btn-sm btn-outline btn-primary">
                                    Simpan gizi
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

        function formatRupiah(input) {
            let value = input.value.replace(/[^0-9]/g, ''); // Hanya angka
            let formatted = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);

            input.value = formatted.replace('Rp', '').trim(); // Menghapus simbol Rp agar mudah diolah backend
        }
    </script>
</x-app-layout>

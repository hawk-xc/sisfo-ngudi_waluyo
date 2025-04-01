<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah data Penanggung Jawab') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <div class="flex justify-end w-full">
                            <a href="{{ route('pj.index') }}" class="btn btn-outline btn-neutral btn-sm"><i
                                    class="ri-arrow-left-long-line"></i>
                                Kembali ke halaman Penanggung Jawab</a>
                        </div>
                        <form action="{{ route('pj.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div action="" class="flex flex-col w-full gap-2 p-5">
                                <div id="form" class="flex flex-col flex-1 gap-3">
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="name">Nama Penanggung Jawab</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="name" id="name"
                                                placeholder="ex. Jogn Doe"
                                                class="w-full input {{ $errors->has('name') ? 'input-error' : '' }}"
                                                value="{{ old('name') }}" required>
                                            @if ($errors->first('name'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('name') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="email">Email Penanggung Jawab</label>
                                        <fieldset class="fieldset">
                                            <input type="email" name="email" id="email"
                                                placeholder="ex. johndoe@gmail.com"
                                                class="w-full input {{ $errors->has('email') ? 'input-error' : '' }}"
                                                value="{{ old('email') }}" required>
                                            @if ($errors->first('email'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('email') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end w-full gap-5">
                                <button id="resetButton"
                                    class="text-red-500 cursor-pointer hover:text-red-600 hover:underline"
                                    type="reset">reset</button>
                                <button type="submit" class="btn btn-sm btn-outline btn-primary">
                                    Simpan Akun Penanggung jawab
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

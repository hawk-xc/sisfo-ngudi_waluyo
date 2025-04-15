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
                                        <label for="nik">NIK</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="nik" id="nik"
                                                placeholder="ex. 1222111133335"
                                                class="w-full input {{ $errors->has('nik') ? 'input-error' : '' }}"
                                                value="{{ old('nik') }}" required>
                                            @if ($errors->first('nik'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('nik') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-row w-full gap-2 p-2">
                                        <div class="w-full">
                                            <label for="born_place">Tempat Lahir</label>
                                            <fieldset class="fieldset">
                                                <input type="text" name="born_place" id="born_place"
                                                    placeholder="ex. Jakarta"
                                                    class="w-full input {{ $errors->has('born_place') ? 'input-error' : '' }}"
                                                    value="{{ old('born_place') }}" required>
                                                @if ($errors->first('born_place'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('born_place') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>
                                        <div class="w-full">
                                            <label for="born_date">Tanggal Lahir</label>
                                            <fieldset class="fieldset">
                                                <input type="date" name="born_date" id="born_date"
                                                    placeholder="ex. 12/12/2000"
                                                    class="w-full input {{ $errors->has('born_date') ? 'input-error' : '' }}"
                                                    value="{{ old('born_date') }}" required>
                                                @if ($errors->first('born_date'))
                                                    <p class="fieldset-label text-error">
                                                        {{ $errors->first('born_date') }}</p>
                                                @endif
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="phone">No Telp</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="phone" id="phone"
                                                placeholder="ex. 082139391212"
                                                class="w-full input {{ $errors->has('phone') ? 'input-error' : '' }}"
                                                value="{{ old('phone') }}" required>
                                            @if ($errors->first('phone'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('phone') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="gender">Jenis Kelamin</label>
                                        <fieldset class="fieldset">
                                            <div class="flex items-center gap-4">
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="gender" value="L"
                                                        class="form-radio" {{ old('gender') == 'L' ? 'checked' : '' }}>
                                                    <span class="ml-2">Laki-laki</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="gender" value="P"
                                                        class="form-radio" {{ old('gender') == 'P' ? 'checked' : '' }}>
                                                    <span class="ml-2">Perempuan</span>
                                                </label>
                                            </div>
                                            @if ($errors->first('gender'))
                                                <p class="fieldset-label text-error">{{ $errors->first('gender') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="address">Alamat</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="address" id="address"
                                                placeholder="ex. Jl. 17 Pantura"
                                                class="w-full input {{ $errors->has('address') ? 'input-error' : '' }}"
                                                value="{{ old('address') }}" required>
                                            @if ($errors->first('address'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('address') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-col gap-2 p-2">
                                        <label for="relationship_name">Hubungan Penanggung Jawab</label>
                                        <fieldset class="fieldset">
                                            <input type="text" name="relationship_name" id="relationship_name"
                                                placeholder="ex. Anak"
                                                class="w-full input {{ $errors->has('relationship_name') ? 'input-error' : '' }}"
                                                value="{{ old('relationship_name') }}" required>
                                            @if ($errors->first('relationship_name'))
                                                <p class="fieldset-label text-error">
                                                    {{ $errors->first('relationship_name') }}</p>
                                            @endif
                                        </fieldset>
                                    </div>
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

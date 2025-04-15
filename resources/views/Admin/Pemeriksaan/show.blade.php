<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detail Data Pemeriksaan') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                callToast('success', '{{ session('success') }}')
            })
        </script>
    @elseif (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                callToast('error', '{{ session('error') }}')
            })
        </script>
    @endif

    <dialog id="my_modal_1" class="modal">
        <div class="max-w-5xl modal-box">
            <h3 class="text-lg font-bold">Tambah Data Gizi Lansia!</h3>
            <form action="{{ route('gizi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="pemeriksaan_id" value="{{ $pemeriksaan->id }}">

                <div id="form" class="flex flex-col flex-1">
                    <div id="gambar" class="flex-1">
                        <div id="gambar-gizi" class="px-5 mb-3">
                            <img id="preview-gambar" src="" alt="Preview Gambar" style="display: none;"
                                class="max-w-full" />
                        </div>
                        <label for="gambar-input" class="my-2">
                            Gambar Gizi
                        </label>
                        <fieldset class="fieldset">
                            <input type="file" id="gambar-input"
                                class="file-input w-full {{ $errors->has('gambar') ? 'file-input-error' : '' }}"
                                name="gambar" accept="image/*" />
                            <label
                                class="fieldset-label {{ $errors->has('gambar') ? 'text-error font-extrabold' : '' }}">Format
                                yang didukung .png, .jpg, .jpeg</label>
                        </fieldset>
                    </div>

                    <div class="flex flex-col gap-1 p-2">
                        <label for="jenis_gizi">Jenis gizi</label>
                        <fieldset class="fieldset">
                            <input type="text" name="jenis_gizi" id="jenis_gizi" placeholder="Nama gizi"
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
                            <input type="text" name="menu_gizi" id="menu_gizi" placeholder="Menu Gizi"
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
                            <input type="text" name="bahan_makanan" id="bahan_makanan" placeholder="Bahan Makanan"
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

                <div class="modal-action">
                    <button type="button" onclick="my_modal_1.close()" class="btn">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </dialog>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <div class="flex items-center justify-between w-full">
                            <span>
                                <span class="font-bold">Tanggal Pemeriksaan :</span>
                                <span class="badge badge-warning">{{ $pemeriksaan->tanggal_pemeriksaan }}
                                    ({{ \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->diffForHumans(\Carbon\Carbon::now(), [
                                        'parts' => 3,
                                        'join' => ', ',
                                    ]) }})
                                </span>
                            </span>
                            <a href="{{ route('pemeriksaan.index') }}" class="btn btn-outline btn-neutral btn-sm">
                                <i class="ri-arrow-left-long-line"></i>
                                Kembali ke halaman Pemeriksaan
                            </a>
                        </div>
                    </div>
                    <div id="main-content" class="flex flex-row justify-between w-full gap-8 p-6">
                        <section id="informasi-lansia" class="flex-1 w-full">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 ri-user-3-fill"></i> Informasi Lansia
                            </h3>

                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <p class="font-medium text-gray-600">Nama:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->lansia->nama ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">NIK:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->lansia->nik ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Alamat:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->lansia->alamat ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Usia:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->lansia->umur ?? '-' }} Tahun</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Jenis Kelamin:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->lansia->jenis_kelamin ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Riwayat Kesehatan:</p>
                                    <p class="text-lg font-semibold">
                                        {{ $pemeriksaan->lansia->riwayat_kesehatan ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Golongan Darah:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->lansia->golongan_darah ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Rhesus:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->lansia->rhesus ?? '-' }}</p>
                                </div>
                            </div>
                        </section>
                        <section id="detail-pemeriksaan" class="flex-1 w-full">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                                <i class="mr-2 text-green-500 ri-stethoscope-line"></i> Detail pemeriksaan
                            </h3>

                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <p class="font-medium text-gray-600">IMT:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->imt . ' kg/m²' ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Analisis IMT:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->analisis_imt ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Tensi Sistolik:</p>
                                    <p class="text-lg font-semibold">
                                        {{ $pemeriksaan->tensi_sistolik . ' mmHg' ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Tensi Diastolik:</p>
                                    <p class="text-lg font-semibold">
                                        {{ $pemeriksaan->tensi_diastolik . ' mmHg' ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Analisis Tensi:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->analisis_tensi ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Tinggi Badan:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->tinggi_badan . ' cm' ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Berat Badan:</p>
                                    <p class="text-lg font-semibold">{{ $pemeriksaan->berat_badan . ' kg' ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    @if ($pemeriksaan->keterangan)
                        <div id="second-content" class="p-6 mt-5">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                                <i class="mr-2 text-orange-400 ri-sticky-note-line"></i> Keterangan Detail Pemeriksaan
                                Lansia
                            </h3>
                            <span>
                                {!! $pemeriksaan->keterangan !!}
                            </span>
                        </div>
                    @endif
                    <div id="third-content" class="p-6 mt-5">
                        <span class="flex flex-row items-center justify-between">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                                <i class="mr-2 text-green-400 ri-restaurant-line"></i> Informasi Gizi Lansia
                            </h3>
                            @role('kader|admin')
                                <button onclick="my_modal_1.showModal()" class="btn btn-sm btn-outline btn-primary"><i
                                        class="ri-add-line"></i> Tambah
                                    Gizi</button>
                            @endrole
                        </span>
                        <div class="overflow-x-auto">
                            <table
                                class="table table-zebra {{ $pemeriksaan->pemeriksaanGizi->isEmpty() ? 'hidden' : '' }}">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Jenis Gizi</th>
                                        <th>Menu Gizi</th>
                                        <th>Bahan Makanan</th>
                                        <th>Harga</th>
                                        @role('kader|admin')
                                            <th>Aksi</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @forelse ($pemeriksaan->pemeriksaanGizi as $item)
                                        @php
                                            $counter++;
                                        @endphp
                                        <tr>
                                            <th>{{ $counter }}</th>
                                            <td>{{ $item->gizi->jenis_gizi }}</td>
                                            <td>{{ $item->gizi->menu }}</td>
                                            <td>{{ $item->gizi->bahan_makanan }}</td>
                                            <td>{{ 'Rp ' . $item->gizi->harga ?? '-' }}</td>
                                            @role('kader|admin')
                                                <th class="join">
                                                    <a href="{{ route('gizi.edit', $item->gizi->id, $pemeriksaan) }}"
                                                        class="btn join-item btn-sm btn-outline btn-warning">
                                                        <i class="ri-edit-line"></i>
                                                    </a>

                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('pemeriksaan.remove_gizi', $item->id) }}"
                                                        method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id"
                                                            value="{{ $item->id }}">
                                                    </form>

                                                    <button class="btn join-item btn-sm btn-error btn-outline"
                                                        onclick="confirmDelete('{{ $item->id }}')">
                                                        <i class="ri-delete-bin-fill"></i>
                                                    </button>
                                                </th>
                                            @endrole
                                        </tr>
                                    @empty
                                        <div class="flex items-center justify-center w-full mt-3 align-middle">
                                            <span>Data Gizi Lansia Kosong!</span>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Load jQuery dan Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />

    @if ($errors->any())
        <script>
            document.getElementById('my_modal_1').showModal();
        </script>
    @endif

    <script>
        function formatRupiah(input) {
            let value = input.value.replace(/[^0-9]/g, ''); // Hanya angka
            let formatted = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);

            input.value = formatted.replace('Rp', '').trim(); // Menghapus simbol Rp agar mudah diolah backend
        }
        $(document).ready(function() {
            // ==================== SELECT2 GIZI ====================
            // $('#input_filter-gizi_id').select2({
            //     placeholder: 'Pilih Menu Gizi atau ketik untuk mencari...',
            //     theme: 'bootstrap-5',
            //     allowClear: true,
            //     width: '100%',
            //     dropdownParent: $('#my_modal_1'),
            //     ajax: {
            //         url: "{{ route('gizi.select2') }}",
            //         delay: 250,
            //         dataType: 'json',
            //         data: function(params) {
            //             return {
            //                 search: params.term,
            //                 page: params.page || 1
            //             };
            //         },
            //         processResults: function(data, params) {
            //             params.page = params.page || 1;
            //             return {
            //                 results: $.map(data.data, function(item) {
            //                     return {
            //                         id: item.id,
            //                         text: `${item.jenis_gizi} - ${item.menu}`,
            //                         jenis_gizi: item.jenis_gizi,
            //                         menu: item.menu,
            //                         bahan_makanan: item.bahan_makanan,
            //                         urt: item.urt,
            //                         berat: item.berat,
            //                         harga: item.harga
            //                     };
            //                 }),
            //                 pagination: {
            //                     more: (params.page * 10) < (data.total || data.data.length)
            //                 }
            //             };
            //         },
            //         cache: true
            //     },
            //     templateResult: function(item) {
            //         if (item.loading) return item.text;
            //         if (!item.id) return item.text;

            //         return $(
            //             '<div class="flex flex-col p-2">' +
            //             '<span class="font-semibold font-xl">' + item.jenis_gizi + '</span>' +
            //             '<div class="flex flex-wrap gap-2 text-sm">' +
            //             '<span>Menu: ' + (item.menu || '-') + '</span>' +
            //             '<span>•</span>' +
            //             '<span>Bahan: ' + (item.bahan_makanan || '-') + '</span>' +
            //             '</div>' +
            //             '<div class="flex gap-2 text-sm">' +
            //             '<span>URT: ' + (item.urt || '-') + '</span>' +
            //             '<span>•</span>' +
            //             '<span>Berat: ' + (item.berat || '-') + ' gram</span>' +
            //             '</div>' +
            //             '</div>'
            //         );
            //     },
            //     templateSelection: function(item) {
            //         if (!item.id) return item.text;
            //         return item.jenis_gizi + ' - ' + item.menu;
            //     }
            // });

            // Fungsi untuk membuka modal

            window.showGiziModal = function() {
                document.getElementById('my_modal_1').showModal();
            };
        });
    </script>
</x-app-layout>

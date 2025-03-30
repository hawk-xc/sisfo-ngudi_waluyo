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
        <div class="modal-box">
            <h3 class="text-lg font-bold">Tambah Data Gizi Lansia!</h3>
            <form action="{{ route('pemeriksaan.attach_gizi') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="pemeriksaan_id" value="{{ $pemeriksaan->id }}">

                <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-1">
                    <!-- Select Gizi -->
                    <div class="flex flex-col gap-2 p-2">
                        <label for="input_filter-gizi_id">Pilih Menu Gizi</label>
                        <select class="w-full select select-bordered" name="gizi_id" id="input_filter-gizi_id"></select>
                        @if ($errors->first('gizi_id'))
                            <p class="mt-1 text-sm text-error">
                                {{ $errors->first('gizi_id') }}
                            </p>
                        @endif
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
                            <button onclick="my_modal_1.showModal()" class="btn btn-sm btn-outline btn-primary"><i
                                    class="ri-add-line"></i> Tambah
                                Gizi</button>
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
                                        <th>Aksi</th>
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
                                            <th class="join">
                                                <a href="{{ route('gizi.edit', $item->gizi->id) }}"
                                                    class="btn join-item btn-sm btn-outline btn-warning">
                                                    <i class="ri-edit-line"></i>
                                                </a>

                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('pemeriksaan.remove_gizi', $item->id) }}"
                                                    method="POST" class="hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                </form>

                                                <button class="btn join-item btn-sm btn-error btn-outline"
                                                    onclick="confirmDelete('{{ $item->id }}')">
                                                    <i class="ri-delete-bin-fill"></i>
                                                </button>
                                            </th>
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

    <style>
        /* Custom styling untuk Select2 di DaisyUI */
        .select2-container--bootstrap-5 .select2-selection {
            /* min-height: 4rem; */
            min-height: 40px;
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            border: 1px solid #a5cdce;
            /* border: 1px solid hsl(var(--bc) / var(--tw-border-opacity)); */
            --tw-border-opacity: 0.2;
            border-radius: var(--rounded-btn, 0.5rem);
            background-color: hsl(var(--b1));
            font-size: 15px;
            color: hsl(var(--bc));
        }

        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
            padding-left: 0;
            color: hsl(var(--bc));
        }

        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 0.75rem;
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            border: 1px solid hsl(var(--bc) / 0.2);
            border-radius: var(--rounded-btn, 0.5rem);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            /* background-color: hsl(var(--b1)); */
            background-color: white;
        }

        .select2-container--bootstrap-5 .select2-results__option {
            padding: 0.5rem 1rem;
            color: hsl(var(--bc));
        }

        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background-color: hsl(var(--p));
            color: hsl(var(--pc));
        }

        .select2-container--bootstrap-5 .select2-search--dropdown .select2-search__field {
            border: 1px solid hsl(var(--bc) / 0.2);
            border-radius: var(--rounded-btn, 0.5rem);
            background-color: hsl(var(--b1));
            color: hsl(var(--bc));
            padding: 0.375rem 0.75rem;
        }
    </style>

    <script>
        $(document).ready(function() {
            // ==================== SELECT2 GIZI ====================
            $('#input_filter-gizi_id').select2({
                placeholder: 'Pilih Menu Gizi atau ketik untuk mencari...',
                theme: 'bootstrap-5',
                allowClear: true,
                width: '100%',
                dropdownParent: $('#my_modal_1'),
                ajax: {
                    url: "{{ route('gizi.select2') }}",
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    id: item.id,
                                    text: `${item.jenis_gizi} - ${item.menu}`,
                                    jenis_gizi: item.jenis_gizi,
                                    menu: item.menu,
                                    bahan_makanan: item.bahan_makanan,
                                    urt: item.urt,
                                    berat: item.berat,
                                    harga: item.harga
                                };
                            }),
                            pagination: {
                                more: (params.page * 10) < (data.total || data.data.length)
                            }
                        };
                    },
                    cache: true
                },
                templateResult: function(item) {
                    if (item.loading) return item.text;
                    if (!item.id) return item.text;

                    return $(
                        '<div class="flex flex-col p-2">' +
                        '<span class="font-semibold font-xl">' + item.jenis_gizi + '</span>' +
                        '<div class="flex flex-wrap gap-2 text-sm">' +
                        '<span>Menu: ' + (item.menu || '-') + '</span>' +
                        '<span>•</span>' +
                        '<span>Bahan: ' + (item.bahan_makanan || '-') + '</span>' +
                        '</div>' +
                        '<div class="flex gap-2 text-sm">' +
                        '<span>URT: ' + (item.urt || '-') + '</span>' +
                        '<span>•</span>' +
                        '<span>Berat: ' + (item.berat || '-') + ' gram</span>' +
                        '</div>' +
                        '</div>'
                    );
                },
                templateSelection: function(item) {
                    if (!item.id) return item.text;
                    return item.jenis_gizi + ' - ' + item.menu;
                }
            });

            // Fungsi untuk membuka modal
            window.showGiziModal = function() {
                document.getElementById('my_modal_1').showModal();
            };
        });
    </script>
</x-app-layout>

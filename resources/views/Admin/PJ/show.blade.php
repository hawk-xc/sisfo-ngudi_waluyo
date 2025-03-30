<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detail Data Penanggung Jawab') }}
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

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <a href="{{ route('pemeriksaan.index') }}" class="btn btn-outline btn-neutral btn-sm">
                            <i class="ri-arrow-left-long-line"></i>
                            Kembali ke halaman Penanggung Jawab
                        </a>
                    </div>
                    <div id="main-content" class="flex flex-col w-full gap-8 p-6">
                        <section id="informasi-lansia" class="flex-1 w-full">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 ri-user-3-fill"></i> Informasi Penanggung Jawab
                            </h3>

                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <p class="font-medium text-gray-600">Nama:</p>
                                    <p class="text-lg font-semibold">John Doe</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Tanggal ditambahkan:</p>
                                    <p class="text-lg font-semibold">10-10-2024</p>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-600">Jenis Hak:</p>
                                    <p class="text-lg font-semibold">Penanggung Jawab</p>
                                </div>
                            </div>
                        </section>
                        <hr>
                        <section id="informasi-kredensial">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                                <i class="mr-2 text-orange-500 ri-lock-password-line"></i> Informasi Kredensial Pengguna
                            </h3>
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <tbody class="border">
                                        <tr>
                                            <th>Email</th>
                                            <td>johndoe@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td>randomstring7-10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <hr>
                        <section id="informasi-data-lansia">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-800">
                                <i class="mr-2 text-orange-500 ri-group-line"></i> Informasi Data Lansia yang
                                diampu
                            </h3>
                            <div class="overflow-x-auto">
                                <table class="table table-zebra">
                                    {{-- {{ $pemeriksaan->pemeriksaanGizi->isEmpty() ? 'hidden' : '' }} --}}
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nama Lansia</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Rosevelt</td>
                                            <td>350101012121</td>
                                            <td class="badge badge-warning">Perempuan</td>
                                            <td>70 Tahun</td>
                                            <th class="join">
                                                <a href="{{ route('lansia.show', 1) }}"
                                                    class="btn join-item btn-sm btn-outline btn-primary">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>2</th>
                                            <td>Daniel</td>
                                            <td>350101012122</td>
                                            <td class="badge badge-primary">Laki-laki</td>
                                            <td>67 Tahun</td>
                                            <th class="join">
                                                <a href="{{ route('lansia.show', 1) }}"
                                                    class="btn join-item btn-sm btn-outline btn-primary">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
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
                                more: (params.page * 10) < script(data.total || data.data.length)
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

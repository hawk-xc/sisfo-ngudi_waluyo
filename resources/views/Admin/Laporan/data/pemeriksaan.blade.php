<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pusat Gizi') }}
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

    <div class="px-4 py-12 md:px-0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 p-4 mb-4 bg-white shadow-sm sm:rounded-lg md:flex-row md:items-center">
                <ul class="flex items-center justify-between flex-1 menu bg-base-200 lg:menu-horizontal rounded-box">
                    <div class="flex flex-row items-center gap-3">
                        <li class="dropdown dropdown-hover dropdown-end">
                            <label tabindex="0" class="flex items-center gap-2 btn btn-ghost">
                                <i class="ri-arrow-up-down-line"></i>
                                Sort by
                            </label>
                            <ul tabindex="0"
                                class="absolute z-50 p-2 shadow-md -right-16 top-8 dropdown-content menu bg-base-100 rounded-box w-44">
                                <li>
                                    <a href="{{ route('pemeriksaan.index', ['sort' => 'asc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-asc"></i> Sort Asc
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('pemeriksaan.index', ['sort' => 'desc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-desc"></i> Sort Desc
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <input type="text" id="dateRange" placeholder="Pilih Rentang Tanggal Pemeriksaan..." readonly
                            class="input w-72 input-sm">
                    </div>
                    <div>
                        <button onclick="exportData('pemeriksaan', 'pdf')" class="btn btn-outline btn-neutral btn-sm">
                            <i class="ri-file-pdf-2-line"></i> Export PDF
                        </button>
                        <a href="{{ route('laporan.index') }}" class="btn btn-outline btn-neutral btn-sm">
                            <i class="ri-arrow-left-long-line"></i>
                            Kembali ke halaman Laporan
                        </a>
                    </div>
                </ul>
            </div>

            <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                <div class="p-2 pt-5 text-gray-900">
                    <table class="pemeriksaan-table" {{ $pemeriksaan->isEmpty() ? 'style="display: none;"' : '' }}>
                        <div class="w-full mb-3 font-semibold text-center">
                            <h2>DATA PEMERIKSAAN LANSIA</h2>
                            <h2>POSLANSIA.................. RW.................</h2>
                            <h2>KELURAHAN.................</h2>
                        </div>

                        <thead>
                            <tr>
                                <th class="no-column">No</th>
                                <th>Nama</th>
                                <th>Tgl-lahir</th>
                                <th>NIK</th>
                                <th>BB</th>
                                <th>TB</th>
                                <th>IMT</th>
                                <th>Tensi</th>
                                <th>Lingkar Perut</th>
                                <th>Gula Darah</th>
                                <th>Kesehatan</th>
                                <th>Rujukan</th>
                            </tr>
                        </thead>
                        <tbody id="pemeriksaanTable">
                            @php
                                $counter = 0;
                            @endphp
                            @forelse ($pemeriksaan as $item)
                                @php
                                    $counter++;
                                @endphp
                                <tr>
                                    <td class="no-column">{{ $counter }}</td>
                                    <td>{{ $item->lansia->nama ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->lansia->tanggal_lahir ?? '')->format('d/m/Y') }}
                                    </td>
                                    <td>{{ $item->lansia->nik ?? '-' }}</td>
                                    <td>{{ $item->berat_badan . ' Kg' ?? '-' }}</td>
                                    <td>{{ $item->tinggi_badan . ' Cm' ?? '-' }}</td>
                                    <td>{{ $item->imt . ' kg/m²' ?? '-' }}</td>
                                    <td>{{ $item->analisis_tensi ?? '-' }}</td>
                                    <td>{{ $item->lingkar_perut . ' Cm' ?? '-' }}</td>
                                    <td>{{ $item->gula_darah . ' mg/dL' ?? '-' }}</td>
                                    <td>{{ $item->healthy_check ?? '-' }}</td>
                                    <td>{{ $item->hospital_referral ? 'Ya' : 'Tidak' ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">
                                        <div class="empty-data">
                                            <span>Data Kosong!</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Jika ingin menggunakan bahasa Indonesia -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>

    <!-- Export Data -->
    <script>
        function exportData(dataType, exportType) {
            const dateRange = document.getElementById('dateRange').value;
            const urlParams = new URLSearchParams(window.location.search);

            let url = `/dashboard/laporan/export/${dataType}?export_type=${exportType}`;

            // Kirim parameter yang sama dengan tampilan web
            if (dateRange) {
                // Format tanggal sesuai dengan yang diharapkan controller
                const formattedRange = dateRange.replace(/\s+/g, ' '); // Normalisasi spasi
                url += `&date_range=${encodeURIComponent(formattedRange)}`;
            }

            // Kirim parameter sort jika ada
            if (urlParams.has('sort')) {
                url += `&sort=${urlParams.get('sort')}`;
            }

            console.log('Export URL:', url); // Debug
            window.location.href = url;
        }
    </script>

    <script>
        // Inisialisasi flatpickr
        const dateRangePicker = flatpickr("#dateRange", {
            mode: "range",
            dateFormat: "Y-m-d", // Ubah format untuk match dengan database
            locale: "id",
            allowInput: true,
            static: true,
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    // Format tanggal untuk dikirim: "Y-m-d to Y-m-d"
                    const formattedDates = selectedDates.map(date =>
                        date.toISOString().split('T')[0]
                    ).join(' to ');
                    loadDataByDateRange(formattedDates);
                }
            }
        });

        function loadDataByDateRange(dateRange) {
            const tableBody = document.getElementById('pemeriksaanTable');
            if (!tableBody) {
                console.error('Element tabel tidak ditemukan!');
                return;
            }

            // Tampilkan loading indicator
            tableBody.innerHTML =
                '<tr><td colspan="12" class="py-4 text-center">Memuat data...</td></tr>';

            fetch(`{{ route('laporan.data.pemeriksaan') }}?date_range=${encodeURIComponent(dateRange)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.html) {
                        tableBody.innerHTML = data.html;
                    } else {
                        tableBody.innerHTML =
                            '<tr><td colspan="12"><div class="empty-data"><span>Data tidak ditemukan</span></div></td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    tableBody.innerHTML =
                        '<tr><td colspan="12" class="py-4 text-center text-red-500">Terjadi kesalahan saat memuat data</td></tr>';
                });
        }
    </script>

    <style>
        .pemeriksaan-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            text-align: left;
            color: #6b7280;
            border: 1px solid #e5e7eb;
        }

        .pemeriksaan-table thead {
            background-color: #f9fafb;
            color: #374151;
            font-size: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #e5e7eb;
        }

        .pemeriksaan-table th,
        .pemeriksaan-table td {
            padding: 0.75rem 1.5rem;
            border-right: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .pemeriksaan-table th:last-child,
        .pemeriksaan-table td:last-child {
            border-right: none;
        }

        .pemeriksaan-table th.no-column,
        .pemeriksaan-table td.no-column {
            width: 50px;
            /* Lebih sempit dari kolom lain */
            padding: 0.75rem 0.5rem;
            /* Padding lebih kecil */
            text-align: center;
        }

        .pemeriksaan-table tbody tr {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .pemeriksaan-table tbody tr:last-child {
            border-bottom: none;
        }

        .pemeriksaan-table tbody td {
            color: #111827;
            font-weight: 500;
        }

        .empty-data {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 0.75rem;
        }
    </style>
</x-app-layout>

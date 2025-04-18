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
                    </div>
                    <button class="btn btn-outline">
                        <i class="ri-file-pdf-2-line"></i> Export Data
                    </button>
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
                                <th>IMT</th>
                                <th>Kesehatan</th>
                                <th>Kesehatan Mental</th>
                                <th>Analisa Tensi</th>
                                <th>Tensi Diastolik</th>
                                <th>Tensi Sistolik</th>
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
                                    <td>{{ $item->imt . ' kg/m²' ?? '-' }}</td>
                                    <td>{{ $item->healthy_check ?? '-' }}</td>
                                    <td>{{ $item->mentality_check ?? '-' }}</td>
                                    <td>{{ $item->analisis_tensi ?? '-' }}</td>
                                    <td>{{ $item->tensi_diastolik . ' mmHg' ?? '-' }}</td>
                                    <td>{{ $item->tensi_sistolik . ' mmHg' ?? '-' }}</td>
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
    <script>
        document.getElementById('search').addEventListener('input', function(e) {
            let query = this.value;

            // Tampilkan loading indicator jika diperlukan
            document.getElementById('pemeriksaanTable').innerHTML =
                '<tr><td colspan="6" class="py-4 text-center">Mencari data...</td></tr>';

            fetch(`{{ route('pemeriksaan.index') }}?search=${query}`, {
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
                    document.getElementById('pemeriksaanTable').innerHTML = data.html;

                    // Update pagination
                    let paginationContainer = document.querySelector('.pagination');
                    if (paginationContainer) {
                        paginationContainer.innerHTML = data.pagination;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('pemeriksaanTable').innerHTML =
                        '<tr><td colspan="6" class="py-4 text-center text-red-500">Terjadi kesalahan saat memuat data</td></tr>';
                });
        });
    </script>
</x-app-layout>

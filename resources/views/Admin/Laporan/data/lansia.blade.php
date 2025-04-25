<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Lansia') }}
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
                                    <a href="{{ route('laporan.data.lansia', ['sort' => 'asc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-asc"></i> Sort Asc
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('laporan.data.lansia', ['sort' => 'desc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-desc"></i> Sort Desc
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div>
                        <button onclick="exportData('lansia', 'pdf')" class="btn btn-outline btn-neutral btn-sm">
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
                    <table class="lansias-table" {{ $lansias->isEmpty() ? 'style="display: none;"' : '' }}>
                        <div class="w-full mb-3 font-semibold text-center">
                            <h2>DATA LANSIA</h2>
                            <h2>POSLANSIA NGUDI WALUYO RW 15</h2>
                            <h2>KELURAHAN BANJARSARI</h2>
                        </div>

                        <thead>
                            <tr>
                                <th class="no-column">No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Perkawinan</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Pendidikan</th>
                                <th>Gol Darah</th>
                                <th>Riwayat</th>
                            </tr>
                        </thead>
                        <tbody id="lansiasTable">
                            @php
                                $counter = 0;
                            @endphp
                            @forelse ($lansias as $item)
                                @php
                                    $counter++;
                                @endphp
                                <tr>
                                    <td class="no-column">{{ $counter }}</td>
                                    <td>{{ $item->nama ?? '-' }}</td>
                                    <td>{{ $item->nik ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir ?? '')->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->age }} Tahun
                                    </td>
                                    <td>{{ $item->jenis_kelamin ?? '-' }}</td>
                                    <td>{{ $item->status_perkawinan ?? '-' }}</td>
                                    <td>{{ $item->alamat ?? '-' }}</td>
                                    <td>{{ $item->agama ?? '-' }}</td>
                                    <td>{{ $item->pendidikan_terakhir ?? '-' }}</td>
                                    <td>{{ $item->golongan_darah ?? '-' }}</td>
                                    <td>{{ $item->riwayat_kesehatan ?? '-' }}</td>
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

    <!-- Export Data -->
    <script>
        function exportData(dataType, exportType) {
            const urlParams = new URLSearchParams(window.location.search);

            let url = `/dashboard/laporan/export/${dataType}?export_type=${exportType}`;

            // Kirim parameter sort jika ada
            if (urlParams.has('sort')) {
                url += `&sort=${urlParams.get('sort')}`;
            }

            console.log('Export URL:', url); // Debug
            window.location.href = url;
        }
    </script>

    <style>
        .lansias-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            text-align: left;
            color: #6b7280;
            border: 1px solid #e5e7eb;
        }

        .lansias-table thead {
            background-color: #f9fafb;
            color: #374151;
            font-size: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #e5e7eb;
        }

        .lansias-table th,
        .lansias-table td {
            padding: 0.75rem 1.5rem;
            border-right: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .lansias-table th:last-child,
        .lansias-table td:last-child {
            border-right: none;
        }

        .lansias-table th.no-column,
        .lansias-table td.no-column {
            width: 50px;
            /* Lebih sempit dari kolom lain */
            padding: 0.75rem 0.5rem;
            /* Padding lebih kecil */
            text-align: center;
        }

        .lansias-table tbody tr {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .lansias-table tbody tr:last-child {
            border-bottom: none;
        }

        .lansias-table tbody td {
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

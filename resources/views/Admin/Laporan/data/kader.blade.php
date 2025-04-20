<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Kader') }}
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
                                    <a href="{{ route('laporan.data.kader', ['sort' => 'asc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-asc"></i> Sort Asc
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('laporan.data.kader', ['sort' => 'desc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-desc"></i> Sort Desc
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div>
                        <button onclick="exportData('kader', 'pdf')" class="btn btn-outline btn-neutral btn-sm">
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
                    <table class="kader-table" {{ $kader->isEmpty() ? 'style="display: none;"' : '' }}>
                        <div class="w-full mb-3 font-semibold text-center">
                            <h2>DATA KADER</h2>
                            <h2>POSLANSIA.................. RW.................</h2>
                            <h2>KELURAHAN.................</h2>
                        </div>

                        <thead>
                            <tr>
                                <th class="no-column">No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                            </tr>
                        </thead>
                        <tbody id="kaderTable">
                            @php
                                $counter = 0;
                            @endphp
                            @forelse ($kader as $item)
                                @php
                                    $counter++;
                                @endphp
                                <tr>
                                    <td class="no-column">{{ $counter }}</td>
                                    <td>{{ $item->name ?? '-' }}</td>
                                    <td>{{ $item->nik ?? '-' }}</td>
                                    <td>{{ $item->email ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->born_date ?? '')->format('d/m/Y') }}
                                    </td>
                                    <td>{{ $item->gender ?? '-' }}</td>
                                    <td>{{ $item->address ?? '-' }}</td>
                                    <td>{{ $item->phone ?? '-' }}</td>
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
        .kader-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            text-align: left;
            color: #6b7280;
            border: 1px solid #e5e7eb;
        }

        .kader-table thead {
            background-color: #f9fafb;
            color: #374151;
            font-size: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #e5e7eb;
        }

        .kader-table th,
        .kader-table td {
            padding: 0.75rem 1.5rem;
            border-right: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .kader-table th:last-child,
        .kader-table td:last-child {
            border-right: none;
        }

        .kader-table th.no-column,
        .kader-table td.no-column {
            width: 50px;
            /* Lebih sempit dari kolom lain */
            padding: 0.75rem 0.5rem;
            /* Padding lebih kecil */
            text-align: center;
        }

        .kader-table tbody tr {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .kader-table tbody tr:last-child {
            border-bottom: none;
        }

        .kader-table tbody td {
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

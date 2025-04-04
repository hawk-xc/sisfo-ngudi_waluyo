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
                    @role('kader|admin')    
                    <li>
                            <a href="{{ route('pemeriksaan.create') }}"
                                class="flex items-center gap-2 btn-sm btn btn-outline btn-neutral">
                                <i class="ri-user-add-line"></i>
                                Tambah Data Pemeriksaan
                            </a>
                        </li>
                        @endrole
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
                    <label class="input">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                stroke="currentColor">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </g>
                        </svg>
                        <input id="search" type="search" class="grow" placeholder="Cari Data Pemeriksaan" />
                        <kbd class="kbd kbd-sm">⌘</kbd>
                        <kbd class="kbd kbd-sm">K</kbd>
                    </label>
                </ul>
            </div>

            <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table
                        class="w-full text-sm text-left text-gray-500 rtl:text-right {{ $pemeriksaan->isEmpty() ? 'hidden' : '' }}">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="grid grid-cols-12">
                                <th class="col-span-1 px-6 py-3">ID</th>
                                <th class="col-span-2 px-6 py-3">Nama Lansia</th>
                                <th class="col-span-2 px-6 py-3">Tanggal Pemeriksaan</th>
                                <th class="col-span-2 px-6 py-3">IMT</th>
                                <th class="col-span-3 px-6 py-3">Pemberian Gizi</th>
                                <th class="col-span-2 px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="pemeriksaanTable">
                            @forelse ($pemeriksaan as $item)
                                <tr class="grid grid-cols-12 bg-white border-b border-gray-200">
                                    <td class="col-span-1 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ '#' . $item->id ?? '-' }}
                                    </td>
                                    <td class="col-span-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        @if ($item->lansia)
                                            @switch($item->lansia->jenis_kelamin)
                                                @case('Laki-laki')
                                                    Tn.
                                                @break

                                                @default
                                                    Ny.
                                            @endswitch
                                        @endif
                                        {{ $item->lansia->nama ?? '-' }}
                                    </td>
                                    <td class="col-span-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->tanggal_pemeriksaan ?? '-' }}
                                    </td>
                                    <td class="col-span-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->imt . ' kg/m²' ?? '-' }}
                                    </td>
                                    <td class="col-span-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        @if ($item->pemeriksaanGizi->count() > 0)
                                            <span class="badge badge-primary">
                                                {{ $item->pemeriksaanGizi->count() }} Data Gizi ditambahkan
                                            </span>
                                        @else
                                            <span class="badge badge-warning">
                                                belum ditentukan
                                            </span>
                                        @endif
                                    </td>
                                    <td class="flex col-span-2 px-2 py-4 join">
                                        <a href="{{ route('pemeriksaan.show', $item->id) }}"
                                            class="btn join-item btn-sm btn-outline btn-primary">
                                            <i class="ri-eye-line"></i>
                                        </a>

                                        @role('kader|admin')
                                        <a href={{ route('pemeriksaan.edit', $item->id) }}
                                            class="btn join-item btn-sm btn-outline btn-warning">
                                            <i class="ri-edit-2-fill"></i>
                                        </a>

                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('pemeriksaan.destroy', $item->id) }}" method="POST"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <button class="btn join-item btn-sm btn-error btn-outline"
                                            onclick="confirmDelete('{{ $item->id }}')">
                                            <i class="ri-delete-bin-fill"></i>
                                        </button>
                                        @endrole
                                    </td>
                                </tr>
                                @empty
                                    <div class="flex items-center justify-center w-full mt-3 align-middle">
                                        <span>Data Kosong!</span>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4 bg-slate-100 pagination">
                            {{ $pemeriksaan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

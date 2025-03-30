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
                        <li>
                            <a href="{{ route('gizi.create') }}"
                                class="flex items-center gap-2 btn-sm btn btn-outline btn-neutral">
                                <i class="ri-user-add-line"></i>
                                Tambah Data Gizi
                            </a>
                        </li>
                        <li class="dropdown dropdown-hover dropdown-end">
                            <label tabindex="0" class="flex items-center gap-2 btn btn-ghost">
                                <i class="ri-arrow-up-down-line"></i>
                                Sort by
                            </label>
                            <ul tabindex="0"
                                class="absolute z-50 p-2 shadow-md -right-16 top-8 dropdown-content menu bg-base-100 rounded-box w-44">
                                <li>
                                    <a href="{{ route('gizi.index', ['sort' => 'asc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-asc"></i> Sort Asc
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('gizi.index', ['sort' => 'desc']) }}"
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
                        <input id="search" type="search" class="grow" placeholder="Cari Gizi" />
                        <kbd class="kbd kbd-sm">⌘</kbd>
                        <kbd class="kbd kbd-sm">K</kbd>
                    </label>
                </ul>
            </div>

            <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right"
                        {{ $gizi->isEmpty() ? 'hidden' : '' }}>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="grid grid-cols-12">
                                <th class="col-span-4 px-6 py-3">Gambar</th>
                                <th class="col-span-2 px-6 py-3">Jenis gizi</th>
                                <th class="col-span-2 px-6 py-3">Menu gizi</th>
                                <th class="col-span-2 px-6 py-3">Bahan Makanan</th>
                                <th class="col-span-1 px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="giziTable">
                            @forelse ($gizi as $item)
                                <tr class="grid grid-cols-12 bg-white border-b border-gray-200">
                                    <td class="col-span-4 p-5">
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded-md w-72"
                                            alt="">
                                    </td>
                                    <td class="col-span-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->jenis_gizi ?? '-' }}
                                    </td>
                                    <td class="col-span-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->menu ?? '-' }}
                                    </td>
                                    <td class="col-span-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->bahan_makanan ?? '-' }}
                                    </td>
                                    <td class="flex col-span-1 px-2 py-4 join">
                                        <a href={{ route('gizi.edit', $item->id) }}
                                            class="btn btn-sm btn-outline join-item btn-primary">
                                            <i class="ri-edit-2-fill"></i>
                                        </a>

                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('gizi.destroy', $item->id) }}" method="POST"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <button class="btn btn-sm btn-error join-item btn-outline"
                                            onclick="confirmDelete('{{ $item->id }}')">
                                            <i class="ri-delete-bin-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <div class="flex items-center justify-center w-full mt-3 align-middle">
                                    <span>Data Kosong!</span>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 bg-slate-100">
                        {{ $gizi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('search').addEventListener('input', function() {
            @if (session('success'))
                Swal.fire({
                    title: "Sukses!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            @endif

            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#giziTable tr');
            rows.forEach(row => {
                let name = row.cells[0].textContent.toLowerCase();
                row.style.display = name.includes(filter) ? '' : 'none';
            });
        });
        document.getElementById('search').addEventListener('input', function() {
            let query = this.value;

            fetch("{{ route('gizi.index') }}?search=" + query, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('giziTable').innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Lansia') }}
        </h2>
    </x-slot>

    <div class="px-4 py-12 md:px-0">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 p-4 mb-4 bg-white shadow-sm sm:rounded-lg md:flex-row md:items-center">
                <ul class="flex items-center justify-between flex-1 menu bg-base-200 lg:menu-horizontal rounded-box">
                    <div class="flex flex-row items-center gap-3">
                        <li>
                            <a href="{{ route('lansia.create') }}"
                                class="flex items-center gap-2 btn-sm btn btn-outline btn-neutral">
                                <i class="ri-user-add-line"></i>
                                Tambah Data Lansia
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
                                    <a href="{{ route('lansia.index', ['sort' => 'asc']) }}"
                                        class="flex items-center gap-2">
                                        <i class="ri-sort-asc"></i> Sort Asc
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('lansia.index', ['sort' => 'desc']) }}"
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
                        <input id="search" type="search" class="grow" placeholder="Cari Data Lansia" />
                        <kbd class="kbd kbd-sm">⌘</kbd>
                        <kbd class="kbd kbd-sm">K</kbd>
                    </label>
                </ul>
            </div>

            <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Alamat</th>
                                <th class="px-4 py-2">Usia</th>
                                <th class="px-4 py-2">Jenis Kelamin</th>
                                <th class="px-4 py-2">Nama PJ</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
<tbody id="lansiaTable">
    @forelse ($lansias as $lansia)
        <tr class="bg-white border-b border-gray-200">
            <td class="px-4 py-2">{{ $lansia->nama }}</td>
            <td class="px-4 py-2">{{ $lansia->alamat }}</td>
            <td class="px-4 py-2">{{ $lansia->umur }} Tahun</td>
            <td class="px-4 py-2">{{ $lansia->jenis_kelamin }}</td>
            <td class="px-4 py-2">{{ $lansia->pj_nama }}</td>
            <td class="flex px-4 py-2 join">
                <a href="{{ route('lansia.show', $lansia->id) }}" class="btn btn-sm btn-primary btn-outline join-item">
                    <i class="ri-eye-fill"></i>
                </a>
                <a href="{{ route('lansia.edit', $lansia->id) }}" class="btn btn-sm btn-warning btn-outline join-item">
                    <i class="ri-edit-2-fill"></i>
                </a>
                <button class="btn btn-sm btn-error delete-btn btn-outline join-item" data-id="{{ $lansia->id }}">
                    <i class="ri-delete-bin-6-fill"></i>
                </button>
                <form id="delete-form-{{ $lansia->id }}" action="{{ route('lansia.destroy', $lansia->id) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-4 py-2 text-center text-gray-500">Data Kosong!</td>
        </tr>
    @endforelse
</tbody>

                    </table>
                    <div class="mt-4 bg-slate-100">
                        {{ $lansias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: "Sukses!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            @endif

            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const lansiaId = this.getAttribute('data-id');
                    Swal.fire({
                        title: "Yakin ingin menghapus?",
                        text: "Data lansia ini akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${lansiaId}`).submit();
                        }
                    });
                });
            });

            document.getElementById('search').addEventListener('input', function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll('#lansiaTable tr');
                rows.forEach(row => {
                    let name = row.cells[0].textContent.toLowerCase();
                    row.style.display = name.includes(filter) ? '' : 'none';
                });
            });
        });
    </script>
</x-app-layout>

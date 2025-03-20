<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Lansia') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 md:px-0">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg mb-4 p-4 flex flex-col md:flex-row gap-4 md:items-center">
                <ul class="menu bg-base-200 lg:menu-horizontal rounded-box flex-1">
                    <li>
                        <a href="{{ route('lansia.create') }}" class="flex items-center gap-2">
                            <i class="ri-user-add-line"></i>
                            Tambah Data Lansia
                        </a>
                    </li>
                    <li class="dropdown dropdown-hover dropdown-end">
                        <label tabindex="0" class="btn btn-ghost flex items-center gap-2">
                            <i class="ri-arrow-up-down-line"></i>
                            Sort by
                        </label>
                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box shadow-md w-44 p-2 absolute z-50">
                            <li>
                                <a href="{{ route('lansia.index', ['sort' => 'asc']) }}" class="flex items-center gap-2">
                                    <i class="ri-sort-asc"></i> Sort Asc
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('lansia.index', ['sort' => 'desc']) }}" class="flex items-center gap-2">
                                    <i class="ri-sort-desc"></i> Sort Desc
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <input type="text" id="search" class="input input-bordered w-full md:w-1/3" placeholder="Cari lansia...">
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
                            @foreach ($lansias as $lansia)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-4 py-2">{{ $lansia->nama }}</td>
                                    <td class="px-4 py-2">{{ $lansia->alamat }}</td>
                                    <td class="px-4 py-2">{{ $lansia->umur }} Tahun</td>
                                    <td class="px-4 py-2">{{ $lansia->jenis_kelamin }}</td>
                                    <td class="px-4 py-2">{{ $lansia->pj_nama }}</td>
                                    <td class="px-4 py-2 flex gap-2">
                                        <a href="{{ route('lansia.show', $lansia->id) }}" class="btn btn-sm btn-primary">
                                            <i class="ri-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('lansia.edit', $lansia->id) }}" class="btn btn-sm btn-warning">
                                            <i class="ri-edit-2-fill"></i>
                                        </a>
                                        <button class="btn btn-sm btn-error delete-btn" data-id="{{ $lansia->id }}">
                                            <i class="ri-delete-bin-6-fill"></i>
                                        </button>
                                        <form id="delete-form-{{ $lansia->id }}" action="{{ route('lansia.destroy', $lansia->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    title: "Sukses!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            @endif

            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
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


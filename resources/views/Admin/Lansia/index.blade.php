<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Lansia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
 <div class="bg-white shadow-sm sm:rounded-lg mb-4 p-4">
    <ul class="menu bg-base-200 lg:menu-horizontal rounded-box">
        <li>
            <a href="{{ route('lansia.create') }}">
                <i class="ri-user-add-line"></i>
                Tambah Data Lansia
            </a>
        </li>
        <li class="dropdown dropdown-hover dropdown-end">
            <label tabindex="0" class="btn btn-ghost">
                <i class="ri-arrow-up-down-line"></i>
                Sort by
                <span class="badge badge-xs badge-warning">NEW</span>
            </label>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box shadow-md w-44 p-2 absolute z-50">
                <li><a><i class="ri-sort-asc"></i> Sort Asc</a></li>
                <li><a><i class="ri-sort-desc"></i> Sort Desc</a></li>
            </ul>
        </li>
        <li>
            <a>
                Stats
                <span class="badge badge-xs badge-info"></span>
            </a>
        </li>
    </ul>
</div>


            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">Alamat</th>
                                    <th scope="col" class="px-6 py-3">Usia</th>
                                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lansias as $lansia)
                                    <tr class="bg-white border-b border-gray-200">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $lansia->nama }}
                                        </th>
                                        <td class="px-6 py-4">{{ $lansia->alamat }}</td>
                                        <td class="px-6 py-4">{{ $lansia->umur }} Tahun</td>
                                        <td class="px-6 py-4">{{ $lansia->jenis_kelamin }}</td>
                                        <td class="px-6 py-4">
                                            <button class="btn btn-sm btn-primary">
                                                <i class="text-lg ri-eye-fill"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning">
                                                <i class="text-lg ri-edit-2-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

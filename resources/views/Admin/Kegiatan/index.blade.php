<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="relative overflow-x-auto">
                        <h1 class="text-2xl font-extrabold">Daftar kegiatan</h1>
                        <div class="flex flex-row items-center justify-end min-w-full mb-2">
                            <a href="{{ route('kegiatan.create') }}" class="btn btn-sm btn-outline btn-neutral">Tambah
                                kegiatan
                                <i class="ri-add-line"></i></a>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3" colspan="8">
                                        Nama Kegiatan
                                    </th>
                                    <th scope="col" class="px-6 py-3" colspan="1">
                                        Tanggal kegiatan
                                    </th>
                                    <th scope="col" class="px-6 py-3" colspan="1">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b border-gray-200">
                                    <th scope="row" colspan="8"
                                        class="px-8 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        Posyandu Manggis
                                    </th>
                                    <td class="px-6 py-4" colspan="1">
                                        Jl. Padjajaran No. 17
                                    </td>
                                    <td class="px-6 py-4" colspan="1">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="text-lg ri-eye-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning">
                                            <i class="text-lg ri-edit-2-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-error">
                                            <i class="ri-delete-bin-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

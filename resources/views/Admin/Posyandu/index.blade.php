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
                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Alamat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Nakes
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Lansia
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        Posyandu Manggis
                                    </th>
                                    <td class="px-6 py-4">
                                        Jl. Padjajaran No. 17
                                    </td>
                                    <td class="px-6 py-4">
                                        7 Orang
                                    </td>
                                    <td class="px-6 py-4">
                                        29 Orang
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="text-lg ri-eye-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning">
                                            <i class="text-lg ri-edit-2-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        Posyandu Kurma
                                    </th>
                                    <td class="px-6 py-4">
                                        Jl. Kusumanegara No. 20
                                    </td>
                                    <td class="px-6 py-4">
                                        5 Orang
                                    </td>
                                    <td class="px-6 py-4">
                                        27 Orang
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="text-lg ri-eye-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning">
                                            <i class="text-lg ri-edit-2-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="bg-white">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        Posyandu Kelapa Sawit
                                    </th>
                                    <td class="px-6 py-4">
                                        Jl. Antasena No. 2
                                    </td>
                                    <td class="px-6 py-4">
                                        12 Orang
                                    </td>
                                    <td class="px-6 py-4">
                                        57 Orang
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="text-lg ri-eye-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning">
                                            <i class="text-lg ri-edit-2-fill"></i>
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

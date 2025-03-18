<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard Klinik Ngudi Waluyo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="relative overflow-x-auto">
                        <h1 class="text-2xl font-extrabold">Daftar Gizi</h1>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        @if (session('message'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Informasi',
                                    text: "{{ session('message') }}",
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            </script>
                        @endif


                        <div class="flex flex-row items-center justify-end min-w-full mb-2">
                            <a href="{{ route('gizi.create') }}" class="btn btn-sm btn-outline btn-neutral">Tambah
                                Gizi
                                <i class="ri-add-line"></i></a>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr class="grid grid-cols-12">
                                    <th class="col-span-4 px-6 py-3">Gambar</th>
                                    <th class="col-span-2 px-6 py-3">Jenis gizi</th>
                                    <th class="col-span-2 px-6 py-3">Menu gizi</th>
                                    <th class="col-span-2 px-6 py-3">Bahan Makanan</th>
                                    <th class="col-span-1 px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gizi as $item)
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
                                        <td class="flex col-span-1 gap-2 px-2 py-4">
                                            <a href={{ route('gizi.edit', $item->id) }}
                                                class="btn btn-sm btn-outline btn-primary">
                                                <i class="ri-edit-2-fill"></i>
                                            </a>

                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('gizi.destroy', $item->id) }}" method="POST"
                                                class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <button class="btn btn-sm btn-error btn-outline"
                                                onclick="confirmDelete('{{ $item->id }}')">
                                                <i class="ri-delete-bin-fill"></i>
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

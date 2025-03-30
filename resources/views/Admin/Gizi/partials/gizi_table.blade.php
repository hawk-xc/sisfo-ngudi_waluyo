@forelse ($gizi as $item)
    <tr class="grid grid-cols-12 bg-white border-b border-gray-200">
        <td class="col-span-4 p-5">
            <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded-md w-72" alt="">
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
            <a href={{ route('gizi.edit', $item->id) }} class="btn join-item btn-sm btn-outline btn-primary">
                <i class="ri-edit-2-fill"></i>
            </a>
            <button class="btn btn-sm join-item btn-error btn-outline" onclick="confirmDelete('{{ $item->id }}')">
                <i class="ri-delete-bin-fill"></i>
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="p-4 text-center">Data Kosong!</td>
    </tr>
@endforelse

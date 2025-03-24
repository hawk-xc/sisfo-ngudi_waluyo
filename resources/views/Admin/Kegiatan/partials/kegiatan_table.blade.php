@forelse ($kegiatan as $item)
<tr class="grid grid-cols-12 bg-white border-b border-gray-200">
    <td class="col-span-3 p-5">
        <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded-md w-72" alt="">
    </td>
    <td class="col-span-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        {{ $item->nama_kegiatan ?? '-' }}
    </td>
    <td class="col-span-3 px-6 py-4">
        {{ $item->formatted_date ?? '-' }}
    </td>
    <td class="flex col-span-1 gap-2 px-2 py-4">
        <a href={{ route('kegiatan.edit', $item->slug) }}
            class="btn btn-sm btn-outline btn-primary">
            <i class="ri-edit-2-fill"></i>
        </a>

        <form id="delete-form-{{ $item->id }}" action="{{ route('kegiatan.destroy', $item->slug) }}" method="POST"
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
@empty
<tr>
    <td colspan="4" class="text-center p-4">Data tidak ditemukan.</td>
</tr>
@endforelse

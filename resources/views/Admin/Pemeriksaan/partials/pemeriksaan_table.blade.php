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
            <a href="{{ route('pemeriksaan.show', $item->id) }}" class="btn join-item btn-sm btn-outline btn-primary">
                <i class="ri-eye-line"></i>
            </a>

            <a href={{ route('pemeriksaan.edit', $item->id) }} class="btn join-item btn-sm btn-outline btn-danger">
                <i class="ri-edit-2-fill"></i>
            </a>

            <form id="delete-form-{{ $item->id }}" action="{{ route('pemeriksaan.destroy', $item->id) }}"
                method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>

            <button class="btn join-item btn-sm btn-error btn-outline" onclick="confirmDelete('{{ $item->id }}')">
                <i class="ri-delete-bin-fill"></i>
            </button>
        </td>
    </tr>
    @empty
        <div class="flex items-center justify-center w-full mt-3 align-middle">
            <span>Data Kosong!</span>
        </div>
    @endforelse

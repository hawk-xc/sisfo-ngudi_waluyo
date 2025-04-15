@forelse ($kaders as $kader)
    <tr class="grid grid-cols-12 bg-white border-b border-gray-200">
        <td class="col-span-1 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            {{ $kader->id ?? '-' }}
        </td>
        <td class="col-span-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            {{ $kader->name ?? '-' }}
        </td>
        <td class="col-span-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            {{ $kader->email ?? '-' }}
        </td>
        <td class="flex col-span-2 px-2 py-4 join">
            <a href="{{ route('kader.show', $kader->id) }}" class="btn join-item btn-sm btn-outline btn-primary">
                <i class="ri-eye-line"></i>
            </a>

            {{-- <a href={{ route('pj.edit', $kader->id) }}
            class="btn join-item btn-sm btn-outline btn-warning">
            <i class="ri-edit-2-fill"></i>
        </a> --}}

            @role('admin')
                <form id="delete-form-{{ $kader->id }}" action="{{ route('kader.destroy', $kader->id) }}" method="POST"
                    class="hidden">
                    @csrf
                    @method('DELETE')
                </form>

                <button class="btn join-item btn-sm btn-error btn-outline" onclick="confirmDelete('{{ $kader->id }}')">
                    <i class="ri-delete-bin-fill"></i>
                </button>
            @endrole
        </td>
    @empty
        <div class="flex items-center justify-center w-full mt-3 align-middle">
            <span>Data Kosong!</span>
        </div>
    </tr>
@endforelse

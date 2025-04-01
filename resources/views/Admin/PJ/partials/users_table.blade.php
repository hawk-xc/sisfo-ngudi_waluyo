<tbody id="usersTable">
    <tr class="grid grid-cols-12 bg-white border-b border-gray-200">
        @forelse ($pj_users as $pj_user)
            <td class="col-span-1 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                {{ $pj_user->id ?? '-' }}
            </td>
            <td class="col-span-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                {{ $pj_user->name ?? '-' }}
            </td>
            <td class="col-span-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                {{ $pj_user->email ?? '-' }}
            </td>
            <td class="col-span-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap badge">
                {{ $pj_user->lansias()->count() . ' Lansia' ?? '-' }}
            </td>
            <td class="flex col-span-2 px-2 py-4 join">
                <a href="{{ route('pj.show', $pj_user->id) }}" class="btn join-item btn-sm btn-outline btn-primary">
                    <i class="ri-eye-line"></i>
                </a>

                <a href={{ route('pj.edit', $pj_user->id) }} class="btn join-item btn-sm btn-outline btn-warning">
                    <i class="ri-edit-2-fill"></i>
                </a>

                <form id="delete-form-id_pj" action="{{ route('pj.destroy', 1) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>

                <button class="btn join-item btn-sm btn-error btn-outline" onclick="confirmDelete('1')">
                    <i class="ri-delete-bin-fill"></i>
                </button>
            </td>
        @empty
            <div class="flex items-center justify-center w-full mt-3 align-middle">
                <span>Data Kosong!</span>
            </div>
        @endforelse
    </tr>
</tbody>

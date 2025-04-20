@php
    $counter = 0;
@endphp
@forelse ($kader as $item)
    @php
        $counter++;
    @endphp
    <tr>
        <td class="no-column">{{ $counter }}</td>
        <td>{{ $item->name ?? '-' }}</td>
        <td>{{ $item->nik ?? '-' }}</td>
        <td>{{ $item->email ?? '-' }}</td>
        <td>{{ \Carbon\Carbon::parse($item->born_date ?? '')->format('d/m/Y') }}
        </td>
        <td>{{ $item->gender ?? '-' }}</td>
        <td>{{ $item->address ?? '-' }}</td>
        <td>{{ $item->phone ?? '-' }}</td>
    </tr>
@empty
    <tr>
        <td colspan="11">
            <div class="empty-data">
                <span>Data Kosong!</span>
            </div>
        </td>
    </tr>
@endforelse

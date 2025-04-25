@php
    $counter = 0;
@endphp
@forelse ($lansias as $item)
    @php
        $counter++;
    @endphp
    <tr>
        <td class="no-column">{{ $counter }}</td>
        <td>{{ $item->nama ?? '-' }}</td>
        <td>{{ $item->nik ?? '-' }}</td>
        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir ?? '')->format('d/m/Y') }}
        </td>
        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->age . ' Tahun' ?? '-' }}</td>
        <td>{{ $item->jenis_kelamin ?? '-' }}</td>
        <td>{{ $item->status_perkawinan ?? '-' }}</td>
        <td>{{ $item->alamat ?? '-' }}</td>
        <td>{{ $item->agama ?? '-' }}</td>
        <td>{{ $item->pendidikan_terakhir ?? '-' }}</td>
        <td>{{ $item->golongan_darah ?? '-' }}</td>
        <td>{{ $item->riwayat_kesehatan ?? '-' }}</td>
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

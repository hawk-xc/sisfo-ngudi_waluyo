@php
    $counter = 0;
@endphp
@forelse ($pemeriksaan as $item)
    @php
        $counter++;
    @endphp
    <tr>
        <td class="no-column">{{ $counter }}</td>
        <td>{{ $item->lansia->nama ?? '-' }}</td>
        <td>{{ $item->lansia->tanggal_lahir ? \Carbon\Carbon::parse($item->lansia->tanggal_lahir)->format('d/m/Y') : '-' }}
        </td>
        <td>{{ $item->lansia->nik ?? '-' }}</td>
        <td>{{ $item->berat_badan ? $item->berat_badan . ' Kg' : '-' }}</td>
        <td>{{ $item->tinggi_badan ? $item->tinggi_badan . ' Cm' : '-' }}</td>
        <td>{{ $item->imt ? $item->imt . ' kg/m²' : '-' }}</td>
        <td>{{ $item->analisis_tensi ?? '-' }}</td>
        <td>{{ $item->lingkar_perut ? $item->lingkar_perut . ' Cm' : '-' }}</td>
        <td>{{ $item->gula_darah ? $item->gula_darah . ' mg/dL' : '-' }}</td>
        <td>{{ $item->healthy_check ?? '-' }}</td>
        <td>{{ $item->hospital_referral ? 'Ya' : 'Tidak' }}</td>
    </tr>
@empty
    <tr>
        <td colspan="12">
            <div class="empty-data">
                <span>Data tidak ditemukan untuk rentang tanggal yang dipilih</span>
            </div>
        </td>
    </tr>
@endforelse

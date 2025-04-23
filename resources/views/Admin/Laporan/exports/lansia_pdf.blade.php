<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $fileName }}</title>
    <style>
        /* Gunakan font serif yang tersedia secara universal */
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0px;
            color: #000;
            /* Warna hitam penuh untuk kontras lebih baik */
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 3px 0;
            font-size: 12pt;
            /* Gunakan pt untuk ukuran font yang konsisten di PDF */
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9pt;
            text-align: left;
            border: 1px solid #000;
            /* Garis lebih tegas */
            margin-top: 10px;
            transform: translateX(-15px);
        }

        thead {
            background-color: #f0f0f0;
            /* Warna lebih netral */
            color: #000;
            text-transform: uppercase;
            border-bottom: 2px solid #000;
            /* Garis lebih tebal untuk header */
        }

        th,
        td {
            padding: 4px 8px;
            /* Padding lebih ketat */
            border-right: 1px solid #000;
            white-space: nowrap;
        }

        th:last-child,
        td:last-child {
            border-right: none;
        }

        th.no-column,
        td.no-column {
            width: 30px;
            /* Lebih sempit */
            padding: 4px 2px;
            text-align: center;
        }

        tbody tr {
            background-color: white;
            border-bottom: 1px solid #000;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody td {
            color: #000;
            font-weight: normal;
            /* Tidak perlu bold untuk isi tabel */
        }

        .font-bold {
            font-weight: bold;
        }

        .empty-data {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px 0;
            font-style: italic;
        }

        /* Tambahan untuk tampilan yang lebih rapi */
        @page {
            margin: 1cm;
            size: A4 landscape;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2 class="font-bold">DATA LANSIA</h2>
        <p class="font-bold">POSLANSIA NGUDI WALUYO RW 15</p>
        <p class="font-bold">KELURAHAN BANJARSARI</p>

        @if ($dateRange)
            <p style="font-size: 9pt;">Rentang Tanggal: {{ $dateRange }}</p>
        @endif
        <p style="font-size: 9pt;">Tanggal Export: {{ $currentDate }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="no-column">No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Status Perkawinan</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Gol Darah</th>
                <th>Riwayat</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 0; @endphp
            @forelse ($data as $item)
                @php $counter++; @endphp
                <tr>
                    <td class="no-column">{{ $counter }}</td>
                    <td>{{ $item['Nama'] }}</td>
                    <td>{{ $item['NIK'] }}</td>
                    <td>{{ $item['Tanggal Lahir'] }}</td>
                    <td>{{ $item['Umur'] }}</td>
                    <td>{{ $item['Jenis Kelamin'] }}</td>
                    <td>{{ $item['Status Perkawinan'] }}</td>
                    <td>{{ $item['Alamat'] }}</td>
                    <td>{{ $item['Agama'] }}</td>
                    <td>{{ $item['Pendidikan'] }}</td>
                    <td>{{ $item['Gol Darah'] }}</td>
                    <td>{{ $item['Riwayat'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">
                        <div class="empty-data">
                            <span>Data Kosong!</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>

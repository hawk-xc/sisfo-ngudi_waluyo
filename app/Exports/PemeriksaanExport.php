<?php

namespace App\Exports;

use App\Models\Pemeriksaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PemeriksaanExport implements FromCollection, WithHeadings, WithStyles
{
    protected $pemeriksaan;

    public function __construct($pemeriksaan)
    {
        $this->pemeriksaan = $pemeriksaan;
    }

    public function collection()
    {
        $data = [];
        $counter = 0;

        foreach ($this->pemeriksaan as $item) {
            $counter++;
            $data[] = [
                'No' => $counter,
                'Nama' => $item->lansia->nama ?? '-',
                'Tgl Lahir' => $item->lansia->tanggal_lahir ? \Carbon\Carbon::parse($item->lansia->tanggal_lahir)->format('d/m/Y') : '-',
                'NIK' => $item->lansia->nik ?? '-',
                'BB' => $item->berat_badan ? $item->berat_badan . ' Kg' : '-',
                'TB' => $item->tinggi_badan ? $item->tinggi_badan . ' Cm' : '-',
                'IMT' => $item->imt ? $item->imt . ' kg/m²' : '-',
                'Tensi' => $item->analisis_tensi ?? '-',
                'Lingkar Perut' => $item->lingkar_perut ? $item->lingkar_perut . ' Cm' : '-',
                'Gula Darah' => $item->gula_darah ? $item->gula_darah . ' mg/dL' : '-',
                'Keterangan' => $item->healthy_check ?? '-',
                'Rujukan' => $item->hospital_referral ? 'Ya' : 'Tidak'
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Tgl Lahir',
            'NIK',
            'BB (Kg)',
            'TB (Cm)',
            'IMT (kg/m²)',
            'Tensi',
            'Lingkar Perut (Cm)',
            'Gula Darah (mg/dL)',
            'Keterangan',
            'Rujukan'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            'A:L' => ['alignment' => ['wrapText' => true]],
        ];
    }
}

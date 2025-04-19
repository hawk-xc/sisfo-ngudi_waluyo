<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GenericExport implements FromCollection, WithHeadings, WithStyles
{
    protected $data;
    protected $heading;

    public function __construct($data, $heading = null)
    {
        $this->data = $data;
        $this->heading = $heading;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return $this->heading ?: array_keys($this->data->first() ?? []);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            'A:Z' => ['alignment' => ['wrapText' => true]],
        ];
    }
}

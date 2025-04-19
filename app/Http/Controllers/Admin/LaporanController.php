<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use App\Models\Lansia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Daftar heading untuk masing-masing jenis data
    protected $exportHeadings = [
        'pemeriksaan' => [
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
        ],
        'lansia' => [
            'No',
            'Nama',
            'NIK',
            'Tanggal Lahir',
            'Alamat',
            'Jenis Kelamin',
            'No HP'
        ],
        'pj' => [
            'No',
            'Nama',
            'Email',
            'Role',
            'Tanggal Daftar',
            'Status'
        ]
    ];

    // Daftar view untuk PDF export
    protected $exportViews = [
        'pemeriksaan' => 'Admin.Laporan.exports.pemeriksaan_pdf',
        'lansia' => 'Admin.Laporan.exports.lansia_pdf',
        'pj' => 'Admin.Laporan.exports.pj_pdf'
    ];

    // Daftar nama file untuk export
    protected $exportFileNames = [
        'pemeriksaan' => 'data-pemeriksaan-lansia',
        'lansia' => 'data-lansia',
        'pj' => 'data-penanggung-jawab'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    public function lansia_data(Request $request)
    {
        $lansia = Lansia::query()->orderBy('created_at', 'desc')->get();
        return view('Admin.Laporan.data.lansia', compact('lansia'));
    }

    public function pemeriksaan_data(Request $request)
    {
        $pemeriksaan = $this->getPemeriksaanData($request);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('Admin.Laporan.data.partials.pemeriksaan_table', compact('pemeriksaan'))->render()
            ]);
        }

        return view('Admin.Laporan.data.pemeriksaan', compact('pemeriksaan'));
    }

    public function pj_data(Request $request)
    {
        $pj = User::where('role', 'pj')->orderBy('created_at', 'desc')->get();
        return view('Admin.Laporan.data.pj', compact('pj'));
    }

    // Method untuk export data
    public function export(Request $request, $dataType)
    {
        $exportType = $request->export_type ?? 'excel';

        // Validasi tipe data
        if (!array_key_exists($dataType, $this->exportHeadings)) {
            return back()->with('error', 'Jenis data tidak valid');
        }

        // Ambil data sesuai jenis
        $data = $this->getExportData($dataType, $request);

        if ($exportType === 'excel') {
            return $this->exportToExcel($dataType, $data);
        } elseif ($exportType === 'pdf') {
            return $this->exportToPdf($dataType, $data);
        }

        return back()->with('error', 'Format export tidak valid');
    }

    // Method untuk mendapatkan data
    protected function getExportData($dataType, Request $request)
    {
        switch ($dataType) {
            case 'pemeriksaan':
                return $this->getPemeriksaanData($request);
            case 'lansia':
                return Lansia::query()
                    ->when($request->has('date_range'), function ($query) use ($request) {
                        $dates = explode(' to ', $request->date_range);
                        if (count($dates) == 2) {
                            $query->whereBetween('created_at', [
                                \Carbon\Carbon::parse(trim($dates[0]))->startOfDay(),
                                \Carbon\Carbon::parse(trim($dates[1]))->endOfDay()
                            ]);
                        }
                    })
                    ->orderBy('created_at', 'desc')
                    ->get();
            case 'pj':
                return User::where('role', 'pj')
                    ->when($request->has('date_range'), function ($query) use ($request) {
                        $dates = explode(' to ', $request->date_range);
                        if (count($dates) == 2) {
                            $query->whereBetween('created_at', [
                                \Carbon\Carbon::parse(trim($dates[0]))->startOfDay(),
                                \Carbon\Carbon::parse(trim($dates[1]))->endOfDay()
                            ]);
                        }
                    })
                    ->orderBy('created_at', 'desc')
                    ->get();
            default:
                return collect();
        }
    }

    // Method untuk mendapatkan data pemeriksaan
    protected function getPemeriksaanData(Request $request)
    {
        $query = Pemeriksaan::with(['lansia', 'gizi'])->orderBy('tanggal_pemeriksaan', 'desc');

        if ($request->has('date_range') && !empty($request->date_range)) {
            $dates = explode(' to ', $request->date_range);

            if (count($dates) == 2) {
                try {
                    $startDate = \Carbon\Carbon::parse(trim($dates[0]))->startOfDay();
                    $endDate = \Carbon\Carbon::parse(trim($dates[1]))->endOfDay();
                    $query->whereBetween('tanggal_pemeriksaan', [$startDate, $endDate]);
                } catch (\Exception $e) {
                    Log::error('Error parsing date range: ' . $e->getMessage());
                }
            }
        }

        return $query->get();
    }

    // Method untuk export Excel
    protected function exportToExcel($dataType, $data)
    {
        $formattedData = $this->formatDataForExport($dataType, $data);
        $headings = $this->exportHeadings[$dataType];
        $fileName = $this->exportFileNames[$dataType] . '.xlsx';

        // Gunakan fully qualified namespace
        return \Maatwebsite\Excel\Facades\Excel::download(
            new class($formattedData, $headings) {
                protected $data;
                protected $headings;

                public function __construct($data, $headings)
                {
                    $this->data = collect($data);
                    $this->headings = $headings;
                }

                public function collection()
                {
                    return $this->data;
                }

                public function headings(): array
                {
                    return $this->headings;
                }
            },
            $fileName
        );
    }

    // Method untuk export PDF
    protected function exportToPdf($dataType, $data)
    {
        $formattedData = $this->formatDataForExport($dataType, $data);

        $pdf = PDF::loadView($this->exportViews[$dataType], [
            'data' => $formattedData,
            'heading' => $this->exportHeadings[$dataType],
            'fileName' => $this->exportFileNames[$dataType]
        ])->setPaper('a4', 'landscape');

        return $pdf->download($this->exportFileNames[$dataType] . '.pdf');
    }

    // Method untuk format data sebelum di-export
    protected function formatDataForExport($dataType, $data)
    {
        switch ($dataType) {
            case 'pemeriksaan':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->lansia->nama ?? '-',
                        'Tgl Lahir' => $item->lansia->tanggal_lahir ? \Carbon\Carbon::parse($item->lansia->tanggal_lahir)->format('d/m/Y') : '-',
                        'NIK' => $item->lansia->nik ?? '-',
                        'BB (Kg)' => $item->berat_badan ? $item->berat_badan . ' Kg' : '-',
                        'TB (Cm)' => $item->tinggi_badan ? $item->tinggi_badan . ' Cm' : '-',
                        'IMT (kg/m²)' => $item->imt ? $item->imt . ' kg/m²' : '-',
                        'Tensi' => $item->analisis_tensi ?? '-',
                        'Lingkar Perut (Cm)' => $item->lingkar_perut ? $item->lingkar_perut . ' Cm' : '-',
                        'Gula Darah (mg/dL)' => $item->gula_darah ? $item->gula_darah . ' mg/dL' : '-',
                        'Keterangan' => $item->healthy_check ?? '-',
                        'Rujukan' => $item->hospital_referral ? 'Ya' : 'Tidak'
                    ];
                });
            case 'lansia':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->nama,
                        'NIK' => $item->nik,
                        'Tanggal Lahir' => $item->tanggal_lahir->format('d/m/Y'),
                        'Alamat' => $item->alamat,
                        'Jenis Kelamin' => $item->jenis_kelamin,
                        'No HP' => $item->no_hp
                    ];
                });
            case 'pj':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->name,
                        'Email' => $item->email,
                        'Role' => $item->role,
                        'Tanggal Daftar' => $item->created_at->format('d/m/Y H:i'),
                        'Status' => $item->is_active ? 'Aktif' : 'Nonaktif'
                    ];
                });
            default:
                return $data;
        }
    }
}

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
            'Kesehatan',
            'Rujukan'
        ],
        'lansia' => [
            'No',
            'Nama',
            'NIK',
            'Tanggal Lahir',
            'Umur',
            'Jenis Kelamin',
            'Status Perkawinan',
            'Alamat',
            'Agama',
            'Pendidikan',
            'Gol Darah',
            'Riwayat',
        ],
        'pj' => [
            'Nama',
            'NIK',
            'Email',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'No Telp'
        ],
        'kader' => [
            'Nama',
            'NIK',
            'Email',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'No Telp'
        ]
    ];

    // Daftar view untuk PDF export
    protected $exportViews = [
        'pemeriksaan' => 'Admin.Laporan.exports.pemeriksaan_pdf',
        'lansia' => 'Admin.Laporan.exports.lansia_pdf',
        'pj' => 'Admin.Laporan.exports.pj_pdf',
        'kader' => 'Admin.Laporan.exports.kader_pdf'
    ];

    // Daftar nama file untuk export
    protected $exportFileNames = [
        'pemeriksaan' => 'data-pemeriksaan-lansia',
        'lansia' => 'data-lansia',
        'pj' => 'data-penanggung-jawab',
        'kader' => 'data-kader'
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
        $lansias = $this->getLansiaData($request);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('Admin.Laporan.data.partials.lansia_table', compact('lansias'))->render()
            ]);
        }

        return view('Admin.Laporan.data.lansia', compact('lansias'));
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
        $pjs = $this->getPjData($request);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('Admin.Laporan.data.partials.pj_table', compact('pjs'))->render()
            ]);
        }
        return view('Admin.Laporan.data.pj', compact('pjs'));
    }

    public function kader_data(Request $request)
    {
        $kader = $this->getKaderData($request);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('Admin.Laporan.data.partials.kader_table', compact('kader'))->render()
            ]);
        }
        return view('Admin.Laporan.data.kader', compact('kader'));
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
    // Method untuk mendapatkan data
    protected function getExportData($dataType, Request $request)
    {
        switch ($dataType) {
            case 'pemeriksaan':
                return $this->getPemeriksaanData($request);
            case 'lansia':
                return $this->getLansiaData($request);
            case 'pj':
                return $this->getPjData($request);
            case 'kader':
                return $this->getKaderData($request);
            default:
                return collect();
        }
    }

    protected function parseDateRange($dateRange)
    {
        if (empty($dateRange)) {
            return null;
        }

        // Coba kedua format pemisah
        $dates = explode(' to ', $dateRange);
        if (count($dates) !== 2) {
            $dates = explode(' - ', $dateRange);
        }

        if (count($dates) === 2) {
            try {
                return [
                    'start' => \Carbon\Carbon::parse(trim($dates[0]))->startOfDay(),
                    'end' => \Carbon\Carbon::parse(trim($dates[1]))->endOfDay()
                ];
            } catch (\Exception $e) {
                Log::error('Error parsing date range: ' . $e->getMessage());
            }
        }

        return null;
    }


    // Method untuk mendapatkan data pemeriksaan
    protected function getPemeriksaanData(Request $request)
    {
        $query = Pemeriksaan::with(['lansia', 'gizi'])
            ->join('lansias', 'pemeriksaan.lansia_id', '=', 'lansias.id');

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('lansias.nama', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('tanggal_pemeriksaan', [$dates['start'], $dates['end']]);
        }

        return $query->get(['pemeriksaan.*']); // Pastikan hanya kolom pemeriksaan yang diambil
    }

    protected function getLansiaData(Request $request)
    {
        $query = Lansia::query();

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('nama', $sortDirection);

        $results = $query->get();

        return $results;
    }

    protected function getPjData(Request $request)
    {
        $query = User::query();

        $query->where('role_id', 3);

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('name', $sortDirection);

        $results = $query->get();

        return $results;
    }

    protected function getKaderData(Request $request)
    {
        $query = User::query();

        $query->where('role_id', 2);

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('name', $sortDirection);

        $results = $query->get();

        return $results;
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
        $currentDate = now()->format('d-m-Y');

        $pdf = PDF::loadView($this->exportViews[$dataType], [
            'data' => $formattedData,
            'heading' => $this->exportHeadings[$dataType],
            'fileName' => $this->exportFileNames[$dataType],
            'currentDate' => $currentDate,
            'dateRange' => request()->date_range ?? null
        ])->setPaper('a4', 'landscape');

        return $pdf->download($this->exportFileNames[$dataType] . '-' . now()->format('Ymd') . '.pdf');
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
                        'Kesehatan' => $item->healthy_check ?? '-',
                        'Rujukan' => $item->hospital_referral ? 'Ya' : 'Tidak'
                    ];
                });
            case 'lansia':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->nama ?? '-',
                        'NIK' => $item->nik ?? '-',
                        'Tanggal Lahir' => $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') : '-',
                        'Umur' => $item->umur ?? '-',
                        'Jenis Kelamin' => $item->jenis_kelamin ?? '-',
                        'Status Perkawinan' => $item->status_perkawinan ?? '-',
                        'Alamat' => $item->alamat ?? '-',
                        'Agama' => $item->agama ?? '-',
                        'Pendidikan' => $item->pendidikan_terakhir ?? '-',
                        'Gol Darah' => $item->golongan_darah ?? '-',
                        'Riwayat' => $item->riwayat_kesehatan ?? '-'
                    ];
                });
            case 'pj':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->name,
                        'NIK' => $item->nik ?? '-',
                        'Email' => $item->email,
                        'Jenis Kelamin' => $item->gender ?? '-',
                        'Alamat' => $item->address,
                        'No Telp' => $item->phone,
                    ];
                });
            case 'kader':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->name,
                        'NIK' => $item->nik ?? '-',
                        'Email' => $item->email,
                        'Jenis Kelamin' => $item->gender ?? '-',
                        'Alamat' => $item->address,
                        'No Telp' => $item->phone,
                    ];
                });
            default:
                return $data;
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

abstract class ExportController extends Controller
{
    abstract protected function getExportData(Request $request);
    abstract protected function getExportView();
    abstract protected function getFileName();

    // Ubah menjadi non-abstract dengan default null
    protected function getExportHeading()
    {
        return null; // Default tidak ada heading
    }

    // Tambahkan method untuk format data
    protected function formatDataForExport($data)
    {
        return $data->map(function ($item, $index) {
            return [
                'No' => $index + 1,
                // Default format, bisa dioverride di child class
                'Data' => json_encode($item->toArray())
            ];
        });
    }

    public function export(Request $request)
    {
        $type = $request->type ?? 'excel';

        if ($type === 'excel') {
            return $this->exportExcel($request);
        } elseif ($type === 'pdf') {
            return $this->exportPdf($request);
        }

        return back()->with('error', 'Format export tidak valid');
    }

    public function exportExcel(Request $request)
    {
        $data = $this->getExportData($request);
        $exportClass = $this->getExportClass();

        $exportInstance = new $exportClass(
            $this->formatDataForExport($data),
            $this->getExportHeading()
        );

        return Excel::download($exportInstance, $this->getFileName() . '.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $data = $this->getExportData($request);
        $pdf = PDF::loadView($this->getExportView(), [
            'data' => $data,
            'heading' => $this->getExportHeading()
        ])->setPaper('a4', 'landscape');

        return $pdf->download($this->getFileName() . '.pdf');
    }

    protected function getExportClass()
    {
        return 'App\\Exports\\GenericExport';
    }
}

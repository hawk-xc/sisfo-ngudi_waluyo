<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pemeriksaan;
use App\Models\Lansia;
use App\Models\User;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    public function lansia_data(Request $request)
    {
        return view('Admin.Laporan.data.lansia');
    }

    public function pemeriksaan_data(Request $request)
    {
        $pemeriksaan = Pemeriksaan::with(['lansia', 'gizi'])->get();

        return view('Admin.Laporan.data.pemeriksaan', compact('pemeriksaan'));
    }

    public function pj_data(Request $request)
    {
        return view('Admin.Laporan.data.pj');
    }
}

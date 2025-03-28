<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Pemeriksaan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Pemeriksaan.create', [
            'oldLansia' => old('lansia_id') ? \App\Models\Lansia::find(old('lansia_id')) : null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'imt.numeric' => 'IMT harus berupa angka.',
            'imt.max' => 'IMT tidak boleh lebih dari :max karakter.',
            'lansia_id.required' => 'Lansia wajib diisi.',
            'lansia_id.string' => 'Lansia harus berupa teks.',
            'berat_badan.required' => 'Berat badan wajib diisi.',
            'berat_badan.numeric' => 'Berat badan harus berupa angka.',
            'berat_badan.max' => 'Berat badan tidak boleh lebih dari :max karakter.',
            'tinggi_badan.required' => 'Tinggi badan wajib diisi.',
            'tinggi_badan.numeric' => 'Tinggi badan harus berupa angka.',
            'tinggi_badan.max' => 'Tinggi badan tidak boleh lebih dari :max karakter.',
            'tanggal_pemeriksaan.required' => 'Tanggal pemeriksaan wajib diisi.',
            'tanggal_pemeriksaan.date' => 'Tanggal pemeriksaan harus berupa tanggal yang valid.',
            'tensi_sistolik.required' => 'Tensi sistolik wajib diisi.',
            'tensi_sistolik.numeric' => 'Tensi sistolik harus berupa angka.',
            'tensi_sistolik.max' => 'Tensi sistolik tidak boleh lebih dari :max karakter.',
            'tensi_diastolik.required' => 'Tensi Diastolik wajib diisi.',
            'tensi_diastolik.numeric' => 'Tensi Diastolik harus berupa angka.',
            'tensi_diastolik.max' => 'Tensi Diastolik tidak boleh lebih dari :max karakter.',
            'analisa_imt.required' => 'Analisa IMT wajib diisi.',
            'analisa_imt.in' => 'Analisa IMT harus berupa normal, kurus, gemuk, atau obesitas.',
            'analisa_tensi.required' => 'Analisa tensi wajib diisi.',
            'analisa_tensi.in' => 'Analisa tensi harus berupa normal, hipotensi, prehipertensi, hipertensi stage 1, hipertensi stage 2, atau krisis hipertensi.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];

        $validatedData = $request->validate([
            'imt' => 'numeric|max:255',
            'lansia_id' => 'required|string',
            'berat_badan' => 'required|numeric|max:255',
            'tinggi_badan' => 'required|numeric|max:255',
            'tanggal_pemeriksaan' => 'required|date',
            'tensi_sistolik' => 'required|numeric|max:255',
            'tensi_diastolik' => 'required|numeric|max:255',
            'analisa_imt' => 'required|in:normal,kurus,gemuk,obesitas',
            'analisa_tensi' => 'required|in:normal,hipotensi,prehipertensi,hipertensi_stage1,hipertensi_stage2,krisis_hipertensi',
            'keterangan' => 'nullable|string',
        ], $messages);

        dd($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

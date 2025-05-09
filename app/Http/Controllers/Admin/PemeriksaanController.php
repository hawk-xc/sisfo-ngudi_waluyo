<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\PemeriksaanGizi;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'asc');
        $search = $request->query('search');

        $query = Pemeriksaan::with(['lansia', 'pemeriksaanGizi'])
            ->orderBy('created_at', $sort);

        if (auth()->user()->checkRole() === 3) {
            $user_id = auth()->user()->id;

            $query->whereHas('lansia.user', function ($q) use ($user_id) {
                $q->where('id', $user_id);
            });
        }

        if ($search) {
            $query->whereHas('lansia', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            });
        }

        $pemeriksaan = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('Admin.Pemeriksaan.partials.pemeriksaan_table', compact('pemeriksaan'))->render(),
                'pagination' => $pemeriksaan->links()->toHtml()
            ]);
        }

        return view('Admin.Pemeriksaan.index', compact('pemeriksaan', 'sort'));
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
            'analisis_imt.required' => 'Analisa IMT wajib diisi.',
            'analisis_imt.in' => 'Analisa IMT harus berupa normal, kurus, gemuk, atau obesitas.',
            'analisis_tensi.required' => 'Analisa tensi wajib diisi.',
            'analisis_tensi.in' => 'Analisa tensi harus berupa normal, hipotensi, prehipertensi, hipertensi stage 1, hipertensi stage 2, atau krisis hipertensi.',

            // add new column
            'healthy_check.required' => 'Pemeriksaan kesehatan wajib diisi.',
            'mentality_check.required' => 'Pemeriksaan mental wajib diisi.',
            'lingkar_perut.required' => 'Lingkar perut wajib diisi.',
            'lingkar_perut.numeric' => 'Lingkar perut harus berupa angka.',
            'gula_darah.required' => 'Gula darah wajib diisi.',
            'gula_darah.numeric' => 'Gula Darah harus berupa angka.',

            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];

        $validatedData = $request->validate([
            'imt' => 'nullable|numeric|max:255',
            'lansia_id' => 'required|string',
            'berat_badan' => 'required|numeric|max:255',
            'tinggi_badan' => 'required|numeric|max:255',
            'tanggal_pemeriksaan' => 'required|date',
            'tensi_sistolik' => 'required|numeric|max:255',
            'tensi_diastolik' => 'required|numeric|max:255',
            'analisis_imt' => 'required|in:normal,kurus,gemuk,obesitas',
            'analisis_tensi' => 'required|in:normal,hipotensi,prehipertensi,hipertensi_stage1,hipertensi_stage2,krisis_hipertensi',

            // new column
            'healthy_check' => 'required',
            'mentality_check' => 'required',
            'lingkar_perut' => 'required|numeric|max:255',
            'gula_darah' => 'required|numeric|max:255',

            'keterangan' => 'nullable|string',
        ], $messages);

        try {
            $validatedData['id_pemeriksaan'] = (string) \Illuminate\Support\Str::uuid();
            $validatedData['kader_name'] = auth()->user()->name;

            $validatedData['hospital_referral'] = $request->hospital_referral ? 1 : 0;

            $pemeriksaan = Pemeriksaan::create($validatedData);

            return redirect(route('pemeriksaan.index'))
                ->with('success', 'Data Pemeriksaan berhasil ditambahkan!')
                ->with('data', $pemeriksaan);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemeriksaan = Pemeriksaan::with(['lansia', 'gizi'])->findOrFail($id);

        // Ambil semua data pemeriksaan lansia ini untuk chart
        $historis = Pemeriksaan::where('lansia_id', $pemeriksaan->lansia_id)
            ->orderBy('tanggal_pemeriksaan', 'asc')
            ->get(['tanggal_pemeriksaan', 'berat_badan', 'tinggi_badan', 'imt']);

        // Kategori IMT berdasarkan WHO
        $kategoriIMT = [
            ['min' => 0, 'max' => 16.0, 'kategori' => 'Berat Badan Sangat Kurang', 'warna' => 'bg-red-500'],
            ['min' => 16.0, 'max' => 16.9, 'kategori' => 'Berat Badan Kurang', 'warna' => 'bg-orange-500'],
            ['min' => 17.0, 'max' => 18.4, 'kategori' => 'Kurang', 'warna' => 'bg-yellow-500'],
            ['min' => 18.5, 'max' => 24.9, 'kategori' => 'Normal', 'warna' => 'bg-green-500'],
            ['min' => 25.0, 'max' => 29.9, 'kategori' => 'Kelebihan Berat', 'warna' => 'bg-blue-500'],
            ['min' => 30.0, 'max' => 100, 'kategori' => 'Obesitas', 'warna' => 'bg-purple-500'],
        ];

        return view('Admin.Pemeriksaan.show', compact('pemeriksaan', 'historis', 'kategoriIMT'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        return view('Admin.Pemeriksaan.edit', compact('pemeriksaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'analisis_imt.required' => 'Analisa IMT wajib diisi.',
            'analisis_imt.in' => 'Analisa IMT harus berupa normal, kurus, gemuk, atau obesitas.',
            'analisis_tensi.required' => 'Analisa tensi wajib diisi.',
            'analisis_tensi.in' => 'Analisa tensi harus berupa normal, hipotensi, prehipertensi, hipertensi stage 1, hipertensi stage 2, atau krisis hipertensi.',

            // add new column
            'healthy_check.required' => 'Pemeriksaan kesehatan wajib diisi.',
            'mentality_check.required' => 'Pemeriksaan mental wajib diisi.',
            'lingkar_perut.required' => 'Lingkar perut wajib diisi.',
            'lingkar_perut.numeric' => 'Lingkar perut harus berupa angka.',
            'gula_darah.required' => 'Gula darah wajib diisi.',
            'gula_darah.numeric' => 'Gula Darah harus berupa angka.',

            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];

        $validatedData = $request->validate([
            'imt' => 'nullable|numeric|max:255',
            'lansia_id' => 'required|string',
            'berat_badan' => 'required|numeric|max:255',
            'tinggi_badan' => 'required|numeric|max:255',
            'tanggal_pemeriksaan' => 'required|date',
            'tensi_sistolik' => 'required|numeric|max:255',
            'tensi_diastolik' => 'required|numeric|max:255',
            'analisis_imt' => 'required|in:normal,kurus,gemuk,obesitas',
            'analisis_tensi' => 'required|in:normal,hipotensi,prehipertensi,hipertensi_stage1,hipertensi_stage2,krisis_hipertensi',

            // new column
            'healthy_check' => 'required',
            'mentality_check' => 'required',
            'lingkar_perut' => 'required|numeric|max:255',
            'gula_darah' => 'required|numeric|max:255',

            'keterangan' => 'nullable|string',
        ], $messages);

        try {
            $validatedData['hospital_referral'] = $request->hospital_referral ? 1 : 0;

            $pemeriksaan = Pemeriksaan::where('id', $id)->update($validatedData);

            return redirect(route('pemeriksaan.index'))
                ->with('success', 'Data Pemeriksaan berhasil diupdate!')
                ->with('data', $pemeriksaan);
        } catch (\Exception $e) {
            // Handle the exception
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        try {
            if ($pemeriksaan->gizi()->count() > 0) {
                foreach (PemeriksaanGizi::where('pemeriksaan_id', $pemeriksaan->id)->get() as $pemeriksaan_gizi) {
                    $pemeriksaan_gizi->delete();
                }
            }

            $pemeriksaan->delete();
        } catch (\Exception $e) {
            return redirect()->route('pemeriksaan.index')->with('error', 'Data Pemeriksaan gagal dihapus');
        }

        return redirect()->route('pemeriksaan.index')->with('success', 'Data Pemeriksaan berhasil dihapus');
    }

    public function attach_gizi(Request $request)
    {
        $pemeriksaan_id = $request->pemeriksaan_id;
        $gizi_id = $request->gizi_id;

        if (empty($gizi_id)) {
            return back()->with('error', 'Gagal Simpan : Data Gizi Belum dipilih');
        }

        PemeriksaanGizi::create([
            'pemeriksaan_id' => $pemeriksaan_id,
            'gizi_id' => $gizi_id
        ]);

        return back()->with('success', 'Berhasil menambahkan data Gizi!');
    }

    public function remove_gizi(Request $request)
    {
        $pemeriksaan_gizi_id = $request->id;

        // dd($pemeriksaan_gizi_id);

        try {
            $query = PemeriksaanGizi::findOrFail($pemeriksaan_gizi_id)->delete();

            return back()->with('success', 'Data Gizi pada detail pemeriksaan berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Gizi pada detail Pemeriksaan gagal dihapus!');
        }
    }
}

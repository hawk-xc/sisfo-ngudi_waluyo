<?php

namespace App\Http\Controllers\Admin;

use \App\Models\Kegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Kegiatan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('kegiatan', 'public');
        } else {
            $gambarPath = null;
        }

        $slug = Str::slug(strtolower($data['name']), '-');

        $slugChecker = Str::slug($slug);
        $checkSlug = Kegiatan::where('slug', $slugChecker)->first();

        if ($checkSlug) {
            return redirect()->back()->withErrors([
                'name' => 'Nama Kegiatan sudah ada, silahkan ganti dengan nama lain'
            ]);
        }

        // Konversi tanggal dari format "2025-03-03T17:40" ke format MySQL "Y-m-d H:i:s"
        $tanggalKegiatan = Carbon::parse($data['tanggal_kegiatan'])->format('Y-m-d H:i:s');

        $kegiatan = new Kegiatan();
        $kegiatan->nama_kegiatan = $data['name'];
        $kegiatan->slug = $slug;
        $kegiatan->keterangan = $data['keterangan'];
        $kegiatan->gambar = $gambarPath;
        $kegiatan->tanggal_kegiatan = $tanggalKegiatan; // Simpan tanggal
        $kegiatan->save();

        if ($kegiatan->wasRecentlyCreated) {
            return redirect()->route('kegiatan.index')->with('message', 'Kegiatan berhasil dibuat');
        }
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

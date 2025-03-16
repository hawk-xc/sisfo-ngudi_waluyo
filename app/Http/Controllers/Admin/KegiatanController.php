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
        $kegiatan = Kegiatan::get();

        return view('Admin.Kegiatan.index', compact('kegiatan'));
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
        $messages = [
            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'nama_kegiatan.string' => 'Nama kegiatan harus berupa teks.',
            'nama_kegiatan.max' => 'Nama kegiatan tidak boleh lebih dari :max karakter.',
            'tanggal_kegiatan.required' => 'Tanggal kegiatan wajib diisi.',
            'tanggal_kegiatan.date' => 'Tanggal kegiatan harus berupa tanggal yang valid.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diperbolehkan adalah .jpeg, .png, .jpg, .gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari :max KB.'
        ];

        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], $messages);

        $slug = Str::slug(strtolower($validatedData['nama_kegiatan']), '-');

        if (Kegiatan::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors([
                'nama_kegiatan' => 'Nama Kegiatan sudah ada, silahkan gunakan nama lain.'
            ])->withInput();
        }

        $tanggalKegiatan = Carbon::parse($validatedData['tanggal_kegiatan'])->format('Y-m-d H:i:s');

        $gambarPath = $request->hasFile('gambar')
            ? $request->file('gambar')->store('kegiatan', 'public')
            : null;

        $kegiatan = Kegiatan::create([
            'nama_kegiatan' => $validatedData['nama_kegiatan'],
            'slug' => $slug,
            'keterangan' => $validatedData['keterangan'],
            'gambar' => $gambarPath,
            'tanggal_kegiatan' => $tanggalKegiatan
        ]);

        return redirect()->route('kegiatan.index')->with('message', 'Kegiatan berhasil dibuat');
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
    public function edit(Kegiatan $kegiatan)
    {
        return view('Admin.Kegiatan.edit', compact('kegiatan'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();

        if ($kegiatan->nama_kegiatan !== $validatedData['nama_kegiatan']) {
            $newSlug = Str::slug(strtolower($validatedData['nama_kegiatan']), '-');

            if (Kegiatan::where('slug', $newSlug)->where('id', '!=', $kegiatan->id)->exists()) {
                return redirect()->back()->withErrors([
                    'nama_kegiatan' => 'Nama Kegiatan sudah ada, silahkan gunakan nama lain.'
                ])->withInput();
            }

            $kegiatan->slug = $newSlug;
        }

        $kegiatan->nama_kegiatan = $validatedData['nama_kegiatan'];
        $kegiatan->keterangan = $validatedData['keterangan'];
        $kegiatan->tanggal_kegiatan = $validatedData['tanggal_kegiatan'];

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('kegiatan', 'public');
            $kegiatan->gambar = $gambarPath;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('message', 'Kegiatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('message', 'Kegiatan berhasil dihapus');
    }
}

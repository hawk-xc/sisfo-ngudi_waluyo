<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Gizi;

class GiziController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'asc');
        $search = $request->query('search');

        $query = Gizi::orderBy('jenis_gizi', $sort);

        if ($search) {
            $query->where('jenis_gizi', 'like', "%$search%")
                ->orWhere('bahan_makanan', 'like', "%$search%")
                ->orWhere('menu', 'like', "%$search%");
        }

        $gizi = $query->paginate(10);

        if ($request->ajax()) {
            return view('Admin.Gizi.partials.gizi_table', compact('gizi'))->render();
        }

        return view('Admin.Gizi.index', compact('gizi', 'sort'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Gizi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            // nama_gizi
            'jenis_gizi.required' => 'Jenis gizi wajib diisi.',
            'jenis_gizi.string' => 'Jenis gizi harus berupa teks.',
            // menu_gizi
            'menu_gizi.required' => 'Menu Gizi wajib diisi.',
            'menu_gizi.string' => 'Menu Gizi harus berupa teks.',
            // bahan_makanan
            'bahan_makanan.required' => 'Bahan Makanan wajib diisi.',
            'bahan_makanan.string' => 'Bahan Makanan harus berupa teks.',
            // berat
            'berat.required' => 'Berat wajib diisi.',
            'berat.string' => 'Berat harus berupa teks.',
            // urt
            'urt.required' => 'URT wajib diisi.',
            'urt.string' => 'URT harus berupa teks.',
            // harga
            'harga.required' => 'Harga wajib diisi.',
            'harga.string' => 'Harga harus berupa teks.',
            // keterangan
            'keterangan.string' => 'Keterangan harus berupa teks.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diperbolehkan adalah .jpeg, .png, .jpg, .gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari :max KB.'
        ];

        $validatedData = $request->validate([
            'jenis_gizi' => 'required|string|max:255',
            'menu_gizi' => 'required|string|max:255',
            'bahan_makanan' => 'required|string|max:255',
            'berat' => 'required|string|max:255',
            'urt' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], $messages);

        $gambarPath = $request->hasFile('gambar')
            ? $request->file('gambar')->store('gizi', 'public')
            : null;

        try {
            $kegiatan = Gizi::create([
                'jenis_gizi' => $validatedData['jenis_gizi'],
                'menu' => $validatedData['menu_gizi'],
                'bahan_makanan' => $validatedData['bahan_makanan'],
                'berat' => $validatedData['berat'],
                'urt' => $validatedData['urt'],
                'harga' => $validatedData['harga'],
                'keterangan' => $validatedData['keterangan'],
                'gambar' => $gambarPath
            ]);

            return redirect()->route('gizi.index')->with('success', 'Berhasil menambah Data Gizi!');
        } catch (\Exception $e) {
            return redirect()->route('gizi.index')->with('error', 'Gagal menambah Data Gizi!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gizi = Gizi::findOrFail($id);

        return view('Admin.Gizi.edit', compact('gizi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gizi = Gizi::findOrfail($id);

        $messages = [
            // nama_gizi
            'jenis_gizi.required' => 'Jenis gizi wajib diisi.',
            'jenis_gizi.string' => 'Jenis gizi harus berupa teks.',
            // menu_gizi
            'menu_gizi.required' => 'Menu Gizi wajib diisi.',
            'menu_gizi.string' => 'Menu Gizi harus berupa teks.',
            // bahan_makanan
            'bahan_makanan.required' => 'Bahan Makanan wajib diisi.',
            'bahan_makanan.string' => 'Bahan Makanan harus berupa teks.',
            // berat
            'berat.required' => 'Berat wajib diisi.',
            'berat.string' => 'Berat harus berupa teks.',
            // urt
            'urt.required' => 'URT wajib diisi.',
            'urt.string' => 'URT harus berupa teks.',
            // harga
            'harga.required' => 'Harga wajib diisi.',
            'harga.string' => 'Harga harus berupa teks.',
            // keterangan
            'keterangan.string' => 'Keterangan harus berupa teks.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diperbolehkan adalah .jpeg, .png, .jpg, .gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari :max KB.'
        ];

        $validatedData = $request->validate([
            'jenis_gizi' => 'required|string|max:255',
            'menu_gizi' => 'required|string|max:255',
            'bahan_makanan' => 'required|string|max:255',
            'berat' => 'required|string|max:255',
            'urt' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], $messages);

        $gizi->jenis_gizi = $validatedData['jenis_gizi'];
        $gizi->menu = $validatedData['menu_gizi'];
        $gizi->bahan_makanan = $validatedData['bahan_makanan'];
        $gizi->berat = $validatedData['berat'];
        $gizi->urt = $validatedData['urt'];
        $gizi->harga = $validatedData['harga'];
        $gizi->keterangan = $validatedData['keterangan'];

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gizi', 'public');
            $gizi->gambar = $gambarPath;
        }

        try {
            $gizi->save();

            return redirect()->route('gizi.index')->with('success', 'Berhasil Update Data Gizi!');
        } catch (\Exception $e) {
            return redirect()->route('gizi.index')->with('error', 'Gagal Update Data Gizi!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gizi = Gizi::findOrFail($id);

        try {
            $gizi->delete();

            return redirect()->route('gizi.index')->with('success', 'Data Gizi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('gizi.index')->with('error', 'Data Gizi gagal dihapus, data gizi telah ditambahkan ke data pemeriksaan!');
        }
    }

    public function select2(Request $request)
    {
        $data = Gizi::query();

        // Select kolom yang diperlukan
        $data->select(['id', 'jenis_gizi', 'keterangan', 'urt', 'menu', 'status', 'bahan_makanan', 'berat', 'harga']);

        // Jika ada pencarian berdasarkan ID (untuk old input)
        if ($request->has('id')) {
            $data->where('id', $request->id);
            $results = $data->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Data Gizi Fetched',
                'data' => $results,
            ]);
        }

        // Jika ada pencarian biasa
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $data->where(function ($query) use ($search) {
                $query->where('jenis_gizi', 'like', '%' . $search . '%')
                    ->orWhere('menu', 'like', '%' . $search . '%')
                    ->orWhere('bahan_makanan', 'like', '%' . $search . '%');
            });
        }

        $data->orderBy('jenis_gizi', 'asc');

        // Handle pagination
        if ($request->has('page')) {
            $perPage = 10;
            $results = $data->paginate($perPage);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Gizi Fetched',
                'data' => $results->items(),
                'pagination' => [
                    'more' => $results->hasMorePages()
                ]
            ]);
        }

        // Default: tampilkan 10 data pertama
        $results = $data->limit(10)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Lansia Fetched',
            'data' => $results,
        ]);
    }
}

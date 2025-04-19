<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLansiaRequest;
use App\Http\Requests\UpdateLansiaRequest;
use App\Models\Lansia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class LansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'asc');
        $field = 'nama';
        $search = $request->query('search');

        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'asc';
        }

        $query = Lansia::orderBy($field, $sort);

        if (auth()->user()->checkRole() === 3) {
            $query->where('user_id', auth()->user()->id);
        }

        if ($search) {
            $query->where('nama', 'like', "%$search%")->orWhere('alamat', 'like', "%$search%")->orWhere('pj_nama', 'like', "%$search");
        }


        // $lansias = Lansia::all();
        $lansias = $query->paginate(10);
        if ($request->ajax()) {
            return view('Admin.Lansia.partials.lansia_table', compact('lansias'))->render();
        }

        // dd($lansias);
        return view('Admin.Lansia.index', compact('lansias', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pjs = User::role('pj')->get();
        return view('Admin.Lansia.create', compact('pjs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:lansias,nik',
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required',
            'pj_id' => 'nullable|exists:users,id',
            'pj_nama' => 'nullable|required_without_all:pj_id,pj_email',
            'pj_email' => 'nullable|required_without_all:pj_id,pj_nama|email|unique:users,email',
            'status_perkawinan' => 'nullable|string|max:50',
            'agama' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'golongan_darah' => 'nullable|string|max:5',
            'rhesus' => 'nullable|string',
            'riwayat_kesehatan' => 'nullable|string',

            'tanggal_lahir' => 'required|date',
        ], [
            'pj_email.unique' => 'User PJ sudah terdaftar.',
            'pj_nama.required_without_all' => 'Nama PJ wajib diisi jika tidak memilih akun yang sudah ada.',
            'pj_email.required_without_all' => 'Email PJ wajib diisi jika tidak memilih akun yang sudah ada.',
        ]);

        // Cek apakah pengguna memilih PJ yg sudah ada
        if ($request->pj_id) {
            $pj = User::find($request->pj_id);
        } else {
            // Jika tidak, gawe user PJ baru
            $pj = User::create([
                'name' => $request->pj_nama,
                'email' => $request->pj_email,
                'password' => bcrypt('password123'),
            ]);

            if (method_exists($pj, 'assignRole')) {
                $pj->assignRole('PJ');
            }
        }

        // Simpan data lansia
        $lansia = Lansia::create([
            'user_id' => $request->pj_id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pj_nama' => $pj->name,
            'pj_email' => $pj->email,
            'status_perkawinan' => $request->status_perkawinan,
            'agama' => $request->agama,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'golongan_darah' => $request->golongan_darah,
            'rhesus' => $request->rhesus,
            'riwayat_kesehatan' => $request->riwayat_kesehatan,

            'tanggal_lahir' => $request->tanggal_lahir,
        ]);


        $pj->update(['lansia_id' => $lansia->id]);
        Alert::success('Sukses', 'Data lansia baru berhasil ditambahkan!');

        return redirect()->route('lansia.index')->with('success', 'Data lansia dan akun PJ berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show($lansia)
    {
        $lansia = Lansia::find($lansia);

        return view('Admin.Lansia.show', compact('lansia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lansia = Lansia::findOrFail($id);
        return view('Admin.Lansia.edit', compact('lansia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|string',
            'pj_nama' => 'required|string|max:255',
            'pj_email' => 'required|email|max:255',
            'status_perkawinan' => 'nullable|string|max:50',
            'agama' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'golongan_darah' => 'nullable|string|max:5',
            'rhesus' => 'nullable|string',
            'riwayat_kesehatan' => 'nullable|string',

            'tanggal_lahir' => 'required|date',
        ]);

        $lansia = Lansia::findOrFail($id);
        $lansia->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pj_nama' => $request->pj_nama,
            'pj_email' => $request->pj_email,
            'status_perkawinan' => $request->status_perkawinan,
            'agama' => $request->agama,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'golongan_darah' => $request->golongan_darah,
            'rhesus' => $request->rhesus,
            'riwayat_kesehatan' => $request->riwayat_kesehatan,

            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('lansia.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lansia = Lansia::findOrFail($id);
        try {
            $lansia->delete();
            Alert::success('Sukses', 'Data lansia berhasil dihapus!');

            return redirect()->route('lansia.index')->with('success', 'Data lansia berhasil dihapus.');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data lansia gagal dihapus, pastikan tidak ada data pemeriksaan pada data Lansia terkait!');

            return redirect()->route('lansia.index')->with('error', 'Data lansia gagal dihapus, pastikan tidak ada data pemeriksaan pada data Lansia terkait!');
        }
    }

    public function select2(Request $request)
    {
        $data = Lansia::query();

        // Select kolom yang diperlukan
        $data->select(['id', 'user_id', 'nama', 'nik', 'alamat', 'tanggal_lahir', 'pj_nama']);

        // Hitung umur
        $data->selectRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) as umur');

        // Filter berdasarkan user_id jika role = 3
        if (auth()->user()->checkRole() === 3) {
            $data->where('user_id', auth()->user()->id);
        }

        // Jika ada pencarian berdasarkan ID (untuk old input)
        if ($request->has('id')) {
            $data->where('id', $request->id);
            $results = $data->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Data Lansia Fetched',
                'data' => $results,
            ]);
        }

        // Jika ada pencarian biasa
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $data->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nik', 'like', '%' . $search . '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%');
            });
        }

        $data->orderBy('nama', 'asc');

        // Handle pagination
        if ($request->has('page')) {
            $perPage = 10;
            $results = $data->paginate($perPage);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Lansia Fetched',
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

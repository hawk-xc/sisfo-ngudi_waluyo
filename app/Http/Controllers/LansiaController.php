<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use App\Http\Requests\StoreLansiaRequest;
use App\Http\Requests\UpdateLansiaRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class LansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lansias = Lansia::all();
        // dd($lansias);
        return view('Admin.Lansia.index', compact('lansias'));
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
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pj_nama' => $pj->name,
            'pj_email' => $pj->email,
        ]);


        $pj->update(['lansia_id' => $lansia->id]);


        return redirect()->route('lansia.index')->with('success', 'Data lansia dan akun PJ berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Lansia $lansia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lansia $lansia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLansiaRequest $request, Lansia $lansia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lansia $lansia)
    {
        //
    }
}

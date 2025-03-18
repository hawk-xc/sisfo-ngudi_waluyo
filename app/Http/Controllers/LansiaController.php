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
        // buatkan form untuk menambahkan data lansia
        return view('Admin.Lansia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nik' => 'required|integer|min:1',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pj_nama' => 'required|string|max:255',
            'pj_email' => 'required|email|unique:users,email',
        ]);
        $user = User::create([
            'name' => $request->pj_nama,
            'email' => $request->pj_email,
            'password' => Hash::make('password123'),
        ]);
        $role = Role::where('name', 'PJ')->first();
        if ($role) {
            $user->assignRole($role);
        }

        // Buat data lansia
        Lansia::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pj_nama' => $request->pj_nama,
            'pj_email' => $request->pj_email,
        ]);
        return redirect()->route('lansia.index')->with('success', 'Data lansia dan akun PJ berhasil ditambahkan');
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

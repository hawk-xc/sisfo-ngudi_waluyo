<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PasswordService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenanggungJawabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'asc');
        $search = $request->query('search');

        $query = User::select([
            'id',
            'name',
            'email',
            'role_id'
        ])->where('role_id', 3)->with(['lansias' => function ($q) {
            $q->select('id');
        }])->orderBy('created_at', $sort);

        if ($search) {
            $query->with(['lansias' => function ($q) {
                $q->select('id');
            }])->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")->orWhere('id', 'like', "%{$search}%");
        }

        $pj_users = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('Admin.PJ.partials.users_table', compact('pj_users'))->render(),
                'pagination' => $pj_users->links()->toHtml()
            ]);
        }

        return view('Admin.PJ.index', compact('pj_users', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.PJ.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = Str::random(8, 12);

        $message = [
            'nik.required' => 'NIK harus diisi',
            'born_place.required' => 'Tempat lahir harus diisi',
            'born_date.required' => 'Tanggal lahir harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
            'gender.required' => 'Jenis kelamin harus dipilih',
            'address.required' => 'Alamat harus diisi',
            'relationship_name.required' => 'Hubungan harus diisi',
            'name.required' => 'Nama Penanggung Jawab harus diisi',
            'email.required' => 'Email Penanggung Jawab harus diisi',
            'email.email' => 'Email Penanggung Jawab harus valid',
            'email.unique' => 'Email Penanggung Jawab sudah terdaftar'
        ];

        $request->validate([
            'nik' => 'required',
            'born_place' => 'required',
            'born_date' => 'required|date',
            'phone' => 'required',
            'gender' => 'required|in:L,P',
            'address' => 'required',
            'relationship_name' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ], $message);

        try {
            $user = User::create([
                'nik' => $request->nik,
                'born_place' => $request->born_place,
                'born_date' => $request->born_date,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address,
                'relationship_name' => $request->relationship_name,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($password),
                'raw_password' => PasswordService::encrypt($password),
                'role_id' => 3
            ]);

            $user->assignRole('pj');

            return redirect()->route('pj.index')
                ->with('success', 'Data Penanggung jawab Berhasil dibuat!');
        } catch (\Exception $e) {
            return redirect()->route('pj.index')
                ->with('error', 'Data Penanggung jawab Gagal dibuat!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pj_user = User::where('id', $id)->with('lansias')->first();

        $decryptedPassword = PasswordService::decrypt($pj_user->raw_password);

        return view('Admin.PJ.show', compact(['pj_user', 'decryptedPassword']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pj_user = User::where('id', $id)->first();

        return view('Admin.PJ.edit', compact('pj_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = [
            'nik.required' => 'NIK harus diisi',
            'born_place.required' => 'Tempat lahir harus diisi',
            'born_date.required' => 'Tanggal lahir harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
            'gender.required' => 'Jenis kelamin harus dipilih',
            'address.required' => 'Alamat harus diisi',
            'relationship_name.required' => 'Hubungan harus diisi',
            'name.required' => 'Nama Penanggung Jawab harus diisi',
            'email.required' => 'Email Penanggung Jawab harus diisi',
            'email.email' => 'Email Penanggung Jawab harus valid',
            'email.unique' => 'Email Penanggung Jawab sudah terdaftar'
        ];

        $validated_data = $request->validate([
            'nik' => 'required',
            'born_place' => 'required',
            'born_date' => 'required|date',
            'phone' => 'required',
            'gender' => 'required|in:L,P',
            'address' => 'required',
            'relationship_name' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ], $message);

        try {
            $pj_user = User::findOrFail($id);

            $pj_user->update([
                'nik' => $validated_data['nik'],
                'born_place' => $validated_data['born_place'],
                'born_date' => $validated_data['born_date'],
                'phone' => $validated_data['phone'],
                'gender' => $validated_data['gender'],
                'address' => $validated_data['address'],
                'relationship_name' => $validated_data['relationship_name'],
                'name' => $validated_data['name'],
                'email' => $validated_data['email']
            ]);

            return redirect()->route('pj.index')->with('success', 'Data Penanggung jawab Berhasil diubah!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Penanggung jawab Gagal diubah!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pj_user = User::where('id', $id)->first();

            $pj_user->delete();

            return back()->with('success', 'Data Penanggung jawab Berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Penanggung jawab Gagal dihapus!');
        }
    }
}

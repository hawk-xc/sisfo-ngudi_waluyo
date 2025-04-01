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
        $password = Str::random(rand(1, 9));

        $message = [
            'name.required' => 'Nama Penanggung Jawab harus diisi',
            'email.required' => 'Email Penanggung Jawab harus diisi',
            'email.email' => 'Email Penanggung Jawab harus valid',
            'email.unique' => 'Email Penanggung Jawab sudah terdaftar'
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ], $message);

        try {
            $user = User::create([
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
            'name.required' => 'Nama Penanggung Jawab harus diisi',
            'email.required' => 'Email Penanggung Jawab harus diisi',
            'email.email' => 'Email Penanggung Jawab harus valid',
            'email.unique' => 'Email Penanggung Jawab sudah terdaftar'
        ];

        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ], $message);

        try {
            $pj_user = User::where('id', $id)->first();

            $pj_user->name = $validated_data['name'];
            $pj_user->email = $validated_data['email'];

            $pj_user->update();

            return redirect()->route('pj.index')->with('success', 'Data Penanggung jawab Berhasil diubah!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Penanggung jawab Gagal diubah!');
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

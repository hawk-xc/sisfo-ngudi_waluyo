<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PasswordService;
use App\Models\User;

class KaderController extends Controller
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
        ])->where('role_id', 2)->orderBy('created_at', $sort);

        if ($search) {
            $query->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
        }

        $kaders = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('Admin.Kader.partials.kader_table', compact('kaders'))->render(),
                'pagination' => $kaders->links()->toHtml()
            ]);
        }

        return view('Admin.Kader.index', compact('kaders', 'sort'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kader = User::findOrFail($id);

        $decryptedPassword = PasswordService::decrypt($kader->raw_password);

        return view('Admin.Kader.show', compact(['kader', 'decryptedPassword']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('kader.index')->with('success', 'Data berhasil dihapus');
    }
}

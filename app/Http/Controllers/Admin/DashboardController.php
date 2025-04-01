<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Lansia;
use \App\Models\Pemeriksaan;
use \App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $metadata = [];

        $metadata['lansia_count'] = Lansia::count();
        $metadata['pemeriksaan_count'] = Pemeriksaan::count();
        $metadata['user_count'] = User::where('role_id', 3)->count();

        return view('dashboard', compact('metadata'));
    }
}

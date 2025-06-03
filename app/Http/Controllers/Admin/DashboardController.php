<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Lansia;
use \App\Models\Pemeriksaan;
use \App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $metadata = [];

        // Query untuk Lansia
        $lansiaQuery = Lansia::query();
        if (auth()->user()->checkRole() === 3) {
            $lansiaQuery->where('user_id', auth()->user()->id);
        }
        // dd($lansiaQuery->count());

        $lansiaQuery->whereDate('created_at', Carbon::today());

        $metadata['lansia_count'] = $lansiaQuery->count();
        // dd($metadata['lansia_count']); // 4

        // Query untuk Pemeriksaan
        $pemeriksaanQuery = Pemeriksaan::query();
        if (auth()->user()->checkRole() === 3) {
            $pemeriksaanQuery->whereHas('lansia', function ($q) {
                $q->where('user_id', auth()->user()->id);
            });
        }
        $metadata['pemeriksaan_count'] = $pemeriksaanQuery->count();

        // Query untuk User (kader)
        $userQuery = User::where('role_id', 3);
        $metadata['user_count'] = $userQuery->count();

        return view('dashboard', compact('metadata'));
    }
}

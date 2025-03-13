<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_kegiatan extends Model
{
    /** @use HasFactory<\Database\Factories\JadwalKegiatanFactory> */
    use HasFactory;
    protected $table = 'jadwal_kegiatan';
    protected $guarded = ['id'];
}

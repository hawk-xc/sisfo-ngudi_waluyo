<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    /** @use HasFactory<\Database\Factories\PemeriksaanFactory> */
    use HasFactory;
    protected $table = 'pemeriksaan';
    protected $guarded = ['id'];
    public function lansia()
    {
        return $this->belongsTo(Lansia::class);
    }
}

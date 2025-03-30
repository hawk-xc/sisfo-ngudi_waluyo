<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';
    protected $guarded = ['id'];

    protected $fillable = [
        'imt',
        'id_pemeriksaan',
        'lansia_id',
        'berat_badan',
        'tinggi_badan',
        'tanggal_pemeriksaan',
        'tensi_sistolik',
        'tensi_diastolik',
        'analisis_imt',
        'analisis_tensi',
        'keterangan'
    ];

    public function lansia()
    {
        return $this->belongsTo(Lansia::class);
    }

    public function gizi()
    {
        return $this->belongsToMany(Gizi::class, 'pemeriksaan_gizi', 'pemeriksaan_id', 'gizi_id')
            ->withTimestamps();
    }

    // Alternative if you need to access the pivot as a model
    public function pemeriksaanGizi()
    {
        return $this->hasMany(PemeriksaanGizi::class);
    }
}

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

    protected $fillable = [
        'id_pemeriksaan',
        'imt',
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
}

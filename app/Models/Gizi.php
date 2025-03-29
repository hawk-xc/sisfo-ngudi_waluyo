<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gizi extends Model
{
    use HasFactory;

    protected $table = 'gizi';
    protected $guarded = ['id'];

    protected $fillable = [
        'jenis_gizi',
        'menu',
        'bahan_makanan',
        'berat',
        'urt',
        'harga',
        'keterangan',
        'gambar'
    ];

    public function pemeriksaans()
    {
        return $this->belongsToMany(Pemeriksaan::class, 'pemeriksaan_gizi', 'gizi_id', 'pemeriksaan_id')
            ->withTimestamps();
    }

    // Alternative if you need to access the pivot as a model
    public function pemeriksaanGizi()
    {
        return $this->hasMany(PemeriksaanGizi::class);
    }
}

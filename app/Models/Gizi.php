<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gizi extends Model
{
    /** @use HasFactory<\Database\Factories\GiziFactory> */
    use HasFactory;

    protected $table = 'gizi';
    protected $guarded = ['id'];

    protected $fillable = [
        'jenis_gizi',
        'jenis_gizi',
        'bahan_makanan',
        'berat',
        'urt',
        'harga',
        'keterangan',
        'gambar'
    ];
}

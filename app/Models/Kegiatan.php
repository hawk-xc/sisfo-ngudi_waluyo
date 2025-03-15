<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'keterangan',
        'gambar'
    ];
}

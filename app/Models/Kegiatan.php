<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $guarded = ['id'];

    protected $fillable = [
        'nama_kegiatan',
        'slug',
        'tanggal_kegiatan',
        'keterangan',
        'gambar'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_kegiatan'])->translatedFormat('l, d F Y, h.i A');
    }
}

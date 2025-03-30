<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemeriksaanGizi extends Pivot
{
    use HasFactory;

    protected $table = 'pemeriksaan_gizi';

    protected $fillable = [
        'pemeriksaan_id',
        'gizi_id'
    ];

    // If you need timestamps
    public $timestamps = true;

    // If you need additional relationships
    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function gizi()
    {
        return $this->belongsTo(Gizi::class);
    }
}

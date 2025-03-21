<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{
    /** @use HasFactory<\Database\Factories\LansiaFactory> */
    use HasFactory;
    protected $table = 'lansias';
    protected $guarded = ['id'];
    protected $fillable = ['nik', 'nama', 'alamat', 'umur', 'jenis_kelamin', 'pj_nama', 'pj_email', 'posyandu_id', 'user_id', 'status_perkawinan', 'agama', 'golongan_darah', 'pendidikan_terakhir',  'rhesus', 'riwayat_kesehatan'];

    // create relations
    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class, 'lansia_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

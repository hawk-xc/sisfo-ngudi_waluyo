<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{
    /** @use HasFactory<\Database\Factories\LansiaFactory> */
    use HasFactory;
    protected $table = 'lansia';
    protected $guarded = ['id'];
}

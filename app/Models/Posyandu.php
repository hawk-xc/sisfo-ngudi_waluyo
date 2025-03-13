<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    /** @use HasFactory<\Database\Factories\PosyanduFactory> */
    use HasFactory;
    protected $table = 'posyandu';
    protected $guarded = ['id'];
}

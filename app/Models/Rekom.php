<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekom extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'rekomendasi';
    protected $primaryKey = 'id_rekomendasi';

    protected $fillable = [
        'produk_rekomendasi'
    ];
}
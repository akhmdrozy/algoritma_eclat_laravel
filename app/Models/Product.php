<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_produk','kode','harga','stok','max_stok'
    ];
}
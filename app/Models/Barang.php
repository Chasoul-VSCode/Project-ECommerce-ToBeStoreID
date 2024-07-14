<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang', 'nama_b', 'category', 'stok_b', 'harga_b', 'status', 'gambar_product'
    ];
}

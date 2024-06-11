<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product'; // Nama tabel yang digunakan

    protected $fillable = ['name', 'qty', 'penjualan'];

    public $timestamps = false; // Disable automatic timestamp management

}

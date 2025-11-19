<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relasi many-to-many: Satu gudang bisa menyimpan banyak produk.
     */
    public function products()
    {
        // Tentukan nama tabel pivot dan ambil kolom 'quantity'
        return $this->belongsToMany(Product::class, 'products_warehouses')->withPivot('quantity');
    }
}
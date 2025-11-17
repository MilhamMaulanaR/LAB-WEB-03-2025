<?php

namespace App\Models;

// TAMBAHKAN BARIS INI
use Illuminate\Database\Eloquent\Factories\HasFactory; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // (Punya saya sebelumnya ada ini, pastikan ada jika Bapak butuh relasi)

class Warehouse extends Model
{
    use HasFactory; // Baris ini sekarang sudah benar

    // Izinkan 'name' dan 'location' diisi massal
    protected $fillable = ['name', 'location'];

    // Relasi N:M -> Satu Gudang punya banyak Produk
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'products_warehouses')
                    ->withPivot('quantity');
    }
}
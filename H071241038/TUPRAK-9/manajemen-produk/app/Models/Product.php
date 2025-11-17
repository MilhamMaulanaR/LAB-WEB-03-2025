<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;    // Import untuk Kategori
use Illuminate\Database\Eloquent\Relations\BelongsToMany;  // Import untuk Gudang
use Illuminate\Database\Eloquent\Relations\HasOne;        // Import untuk Detail

class Product extends Model
{
    use HasFactory;
    
    // Ini sudah benar, mengizinkan pengisian massal
    protected $guarded = ['id'];

    /**
     * Relasi N:1 -> Satu Produk milik satu Kategori
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi 1:1 -> Satu Produk punya satu Detail
     * INI YANG MENYEBABKAN ERROR BAPAK
     */
    public function productDetail(): HasOne
    {
        return $this->hasOne(ProductDetail::class);
    }

    /**
     * Relasi N:M -> Satu Produk ada di banyak Gudang
     * (Kita akan butuh ini nanti)
     */
    public function warehouses(): BelongsToMany
    {
        return $this->belongsToMany(Warehouse::class, 'products_warehouses')
                    ->withPivot('quantity');
    }
}
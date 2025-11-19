<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relasi one-to-one: Satu produk memiliki satu detail.
     */
    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    /**
     * Relasi many-to-one: Satu produk milik satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi many-to-many: Satu produk bisa ada di banyak gudang.
     */
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'products_warehouses')->withPivot('quantity');
    }
}
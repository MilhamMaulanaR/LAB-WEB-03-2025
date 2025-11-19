<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Izinkan mass assignment untuk 'name' dan 'description'
    protected $guarded = [];

    /**
     * Relasi one-to-many: Satu kategori memiliki banyak produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
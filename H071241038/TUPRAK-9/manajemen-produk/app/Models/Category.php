<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk diisi secara massal.
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Satu Kategori memiliki banyak Produk (1:N)
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
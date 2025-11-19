<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relasi one-to-one (inverse): Satu detail milik satu produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
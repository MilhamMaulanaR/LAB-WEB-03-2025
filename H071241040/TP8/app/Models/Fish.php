<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $table = 'fishes'; // penting: samakan dengan migration

    protected $fillable = [
        'name','rarity','base_weight_min','base_weight_max',
        'sell_price_per_kg','catch_probability','description'
    ];

    protected $casts = [
        'base_weight_min'   => 'decimal:2',
        'base_weight_max'   => 'decimal:2',
        'catch_probability' => 'decimal:2',
    ];
}

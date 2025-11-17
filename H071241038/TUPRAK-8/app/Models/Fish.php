<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder; // Import Builder
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $table = 'fishes';

    protected $fillable = [
        'name',
        'rarity',
        'base_weight_min',
        'base_weight_max',
        'sell_price_per_kg',
        'catch_probability',
        'description',
    ];

    protected $casts = [
        'base_weight_min' => 'decimal:2',
        'base_weight_max' => 'decimal:2',
        'catch_probability' => 'decimal:2',
    ];

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
        $query->when($filters['rarity'] ?? false, function ($query, $rarity) {
            return $query->where('rarity', $rarity);
        });
        $query->when($filters['sort_by'] ?? false, function ($query, $sortBy) use ($filters) {
            
            $sortableColumns = ['name', 'sell_price_per_kg', 'catch_probability'];
            
            if (in_array($sortBy, $sortableColumns)) {
                $direction = $filters['sort_dir'] ?? 'asc';
                $direction = in_array($direction, ['asc', 'desc']) ? $direction : 'asc';
                
                return $query->orderBy($sortBy, $direction);
            }
        });

        return $query;
    }

    public function getFormattedPriceAttribute(): string
    {
        return $this->sell_price_per_kg . ' Coins';
    }

    public function getWeightRangeAttribute(): string
    {
        return $this->base_weight_min . ' kg – ' . $this->base_weight_max . ' kg';
    }

    public function getFormattedCatchProbabilityAttribute(): string
    {
        return $this->catch_probability . '%';
    }
}
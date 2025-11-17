<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne; // PASTIKAN INI ADA

class productDetail extends Model
{
    use HasFactory;
    
    protected $guarded = ['id']; 

    public function productDetail(): HasOne
    {
        return $this->hasOne(ProductDetail::class);
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFishRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rarities = ['Common', 'Uncommon', 'Rare', 'Epic', 'Legendary', 'Mythic', 'Secret'];

        return [
            'name' => 'required|string|max:100',
            
            'rarity' => ['required', Rule::in($rarities)],
            
            'base_weight_min' => 'required|numeric|min:0.01',
            
            'base_weight_max' => 'required|numeric|gt:base_weight_min', 
            
            'sell_price_per_kg' => 'required|integer|min:1',
            
            'catch_probability' => 'required|numeric|between:0.01,100.00',
            
            'description' => 'nullable|string',
        ];
    }

    
    public function messages()
    {
        return [
            'base_weight_max.gt' => 'Berat maksimum harus lebih besar dari berat minimum.',
        ];
    }
}
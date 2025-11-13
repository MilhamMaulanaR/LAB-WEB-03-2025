<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    public function rules(): array {
        return [
            'name' => ['required','string','max:255'],
            'location' => ['nullable','string'],
        ];
    }
    public function messages(): array {
        return [
            'name.required' => 'Nama gudang wajib diisi.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array {
        return [
            'name' => ['required','string','max:255'],
            'price' => ['required','numeric','min:0'],
            'category_id' => ['nullable','exists:categories,id'],

         
            'description' => ['nullable','string'],
            'weight' => ['required','numeric','min:0'],
            'size' => ['nullable','string','max:255'],
        ];
    }
    public function messages(): array {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'price.min' => 'Harga produk tidak boleh kurang dari 0.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'weight.required' => 'Berat produk wajib diisi.',
            'weight.numeric' => 'Berat produk harus berupa angka.',
            'weight.min' => 'Berat produk tidak boleh kurang dari 0.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockTransferRequest extends FormRequest
{
    public function rules(): array{
    return [
        'product_id' => 'required|exists:products,id',
        'warehouse_id' => 'required|exists:warehouses,id',
        'delta' => 'required|integer|not_in:0',
    ];
}

public function messages(): array{
    return [
        'product_id.required' => 'Produk harus dipilih.',
        'warehouse_id.required' => 'Gudang harus dipilih.',
        'delta.required' => 'Jumlah perubahan stok wajib diisi.',
        'delta.not_in' => 'Delta tidak boleh 0.',
    ];
}
}

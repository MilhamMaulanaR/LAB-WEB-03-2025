<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products_warehouses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained('warehouses')->onDelete('cascade');
            
            $table->integer('quantity')->default(0);

            // Tambahan (Saran): Pastikan tidak ada duplikat produk di gudang yang sama
            $table->unique(['product_id', 'warehouse_id']);
        });
        
        // Catatan: Pivot table biasanya tidak memerlukan created_at/updated_at,
        // kecuali jika Anda ingin melacak kapan stok diubah. 
        // Sesuai skema Anda, kita tidak menambahkannya.
    }

    public function down(): void
    {
        Schema::dropIfExists('products_warehouses');
    }
};
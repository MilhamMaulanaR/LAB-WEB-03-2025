<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fishes', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name', 100);
        $table->enum('rarity', [
        'Common','Uncommon','Rare','Epic','Legendary','Mythic','Secret'
        ]);
        $table->decimal('base_weight_min', 8, 2);
        $table->decimal('base_weight_max', 8, 2);
        $table->unsignedInteger('sell_price_per_kg');
        $table->decimal('catch_probability', 5, 2); // 0.01 – 100.00
        $table->text('description')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish');
    }
};

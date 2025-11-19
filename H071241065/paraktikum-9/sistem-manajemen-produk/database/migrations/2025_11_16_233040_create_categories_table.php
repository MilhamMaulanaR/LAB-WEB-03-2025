<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Sesuai dengan bigint, primary key, auto_increment
            $table->string('name'); // Sesuai dengan varchar(255), NOT NULL
            $table->text('description')->nullable(); // Sesuai dengan text, NULLABLE
            $table->timestamps(); // create_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
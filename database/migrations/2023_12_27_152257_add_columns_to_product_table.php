<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('photo')->nullable();
            // Tambahkan kolom-kolom baru lainnya sesuai kebutuhan
            $table->timestamps(); // Ini akan menambahkan created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};

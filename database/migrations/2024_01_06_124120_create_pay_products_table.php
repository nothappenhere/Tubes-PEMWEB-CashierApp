<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pay_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Foreign key untuk menghubungkan dengan tabel users
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            // Tambahkan kolom lain sesuai kebutuhan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_products');
    }
};

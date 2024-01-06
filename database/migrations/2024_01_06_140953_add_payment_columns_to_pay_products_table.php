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
        Schema::table('pay_products', function (Blueprint $table) {
            $table->text('address')->nullable()->after('total_price');
            $table->string('phone')->nullable()->after('address');
            $table->enum('status', ['paid', 'unpaid'])->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pay_products', function (Blueprint $table) {
            //
        });
    }
};

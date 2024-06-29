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
        Schema::create('keranjang_produks', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('toko_id');
            $table->integer('keranjang_id');
            $table->integer('produk_id');
            $table->integer('qty');
            $table->double('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_produks');
    }
};

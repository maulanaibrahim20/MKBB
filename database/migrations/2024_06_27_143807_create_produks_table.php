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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->integer('toko_id');
            $table->integer('kategori_id');
            $table->string('namaProduk');
            $table->text('deskripsiProduk');
            $table->string('slug');
            $table->string('stok');
            $table->string('harga');
            $table->enum('ukuran', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->string('warnaProduk');
            $table->enum('statusProduk', ['tersedia', 'habis']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};

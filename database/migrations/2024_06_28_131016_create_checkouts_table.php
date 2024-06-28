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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            $table->integer('keranjang_id');
            $table->date('tanggal');
            $table->enum('status', ['belum bayar', 'sudah bayar', 'dikirim', 'selesai']);
            $table->double('totalHarga');
            $table->integer('customer_id');
            $table->integer('toko_id');
            $table->integer('tipeTransaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};

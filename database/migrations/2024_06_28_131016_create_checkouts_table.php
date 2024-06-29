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
            $table->string('invoiceId');
            $table->string("xenditId", 50)->nullable();
            $table->string("paymentChannel", 100)->nullable();
            $table->enum("tipeTransaksi", ["COD", "ONLINE_PAYMENT"])->nullable();
            $table->integer('keranjang_id');
            $table->date('tanggal');
            $table->double('totalHarga');
            $table->integer('customer_id');
            $table->enum('status', ['belum bayar', 'sudah bayar', 'dikirim', 'selesai']);
            $table->enum('statusPengiriman', ['belum_dikirim', 'dikirim', 'diterima'])->default('belum_dikirim');
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

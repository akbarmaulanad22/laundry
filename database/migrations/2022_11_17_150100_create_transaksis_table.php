<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('outlet_id')->references('id')->on('outlets')->onDelete('cascade');
            $table->foreignId('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->string('kode', 100);
            $table->double('diskon')->default(0);
            $table->date('batas_waktu');
            $table->date('tanggal_pembayaran')->nullable();
            // $table->integer('biaya_tambahan')->length(11);
            $table->integer('pajak')->length(11)->default(0);
            $table->enum('status', ['Dibayar', 'Belum Dibayar'])->default('Belum dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};

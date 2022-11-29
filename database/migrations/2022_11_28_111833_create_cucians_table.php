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
        Schema::create('cucians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
            $table->foreignId('outlet_id')->references('id')->on('outlets')->onDelete('cascade');
            $table->foreignId('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->string('nama', 100);
            $table->enum('jenis', ['Kiloan', 'Selimut', 'Bed cover', 'Kaos', 'Lainnya']);
            $table->enum('status', ['Baru', 'Sedang dicuci', 'Selesai', 'Diambil'])->default('Baru');
            $table->integer('harga')->length(11);
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
        Schema::dropIfExists('cucians');
    }
};

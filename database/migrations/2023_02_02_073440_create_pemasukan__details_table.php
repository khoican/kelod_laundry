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
        Schema::create('pemasukan__details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemasukan_id')->constrained();
            $table->foreignId('jenis__barang_id')->constrained();
            $table->foreignId('jenis__cuci_id')->constrained();
            $table->float('harga');
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
        Schema::dropIfExists('pemasukan__details');
    }
};

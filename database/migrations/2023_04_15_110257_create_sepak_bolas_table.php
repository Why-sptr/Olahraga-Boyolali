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
        Schema::create('sepak_bolas', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->string('ttl');
            $table->bigInteger('nik');
            $table->enum('cabor',['Sepak Bola']);
            $table->enum('level_cabor',['atlet','pelatih']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepak_bolas');
    }
};

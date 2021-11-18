<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_provinsi');
            $table->string('nama_kota');
            $table->bigInteger('wisata_id')->unsigned();
            $table->string('kategori');
            $table->integer('harga')->unsigned();
            $table->text('alamat');
            $table->string('cover')->nullable();

            $table->foreign('wisata_id')->references('id')
            ->on('wisatas')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('destinasis');
    }
}

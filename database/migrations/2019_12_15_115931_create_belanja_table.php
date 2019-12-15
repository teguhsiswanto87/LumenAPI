<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanja', function (Blueprint $table) {
            $table->increments('id_belanja');
            $table->integer('id_pengguna')->unsigned()->index()->nullable();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');

            $table->date('tanggal_belanja');
            $table->bigInteger('total_harga');
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
        Schema::dropIfExists('belanja');
    }
}

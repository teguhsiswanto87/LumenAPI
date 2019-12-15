<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailbelanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_belanja', function (Blueprint $table) {
            $table->integer('id_belanja')->unsigned()->index()->nullable();
            $table->foreign('id_belanja')->references('id_belanja')->on('belanja');

            $table->integer('id_produk')->unsigned()->index()->nullable();
            $table->foreign('id_produk')->references('id_produk')->on('produk');

            $table->bigInteger('harga');
            $table->integer('jumlah');

            // multiple primary key
            $table->primary(array('id_belanja', 'id_produk'));

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_belanja');
    }
}

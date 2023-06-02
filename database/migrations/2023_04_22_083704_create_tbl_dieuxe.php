<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDieuxe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dieuxe', function (Blueprint $table) {
            $table->Increments('dieuxe_id');

            $table->string('donhang_id', 10);
            $table->foreign('donhang_id')
                ->references('dh_id')
                ->on('tbl_donhang')
                ->onUpdate('cascade');

            $table->integer('loaixe')->unsigned();
            $table->foreign('loaixe')
                ->references('loaixe_id')
                ->on('tbl_loaixe')
                ->onUpdate('cascade');

            $table->integer('xe_id')->unsigned();
            $table->foreign('xe_id')
                ->references('xe_id')
                ->on('tbl_xe')
                ->onUpdate('cascade');

            $table->string('laixe', 10);
            $table->foreign('laixe')
                ->references('taixe_id')
                ->on('tbl_taixe')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_dieuxe');
    }
}

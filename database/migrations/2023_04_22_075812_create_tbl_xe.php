<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblXe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_xe', function (Blueprint $table) {
            $table->Increments('xe_id');

            $table->integer('loaixe')->unsigned();
            $table->foreign('loaixe')
                ->references('loaixe_id')
                ->on('tbl_loaixe')
                ->onUpdate('cascade');

            $table->integer('hangxe')->unsigned();
            $table->foreign('hangxe')
                ->references('hangxe_id')
                ->on('tbl_hangxe')
                ->onUpdate('cascade');

            $table->string('biensoxe',20)->unique();
            $table->string('mauson', 20)->nullable();
            $table->integer('namsx')->nullable();
            $table->date('ngaymua')->nullable();
            $table->string('noimua', 255)->nullable();
            $table->date('ngayban')->nullable();
            $table->string('noiban')->nullable();
            $table->integer('trangthai')->default(0);
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
        Schema::dropIfExists('tbl_xe');
    }
}

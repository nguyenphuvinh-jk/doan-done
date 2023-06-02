<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPhatsinhxe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phatsinhxe', function (Blueprint $table) {
            $table->Increments('phatsinhxe_id');

            $table->integer('xe_id')->unsigned();
            $table->foreign('xe_id')
                ->references('xe_id')
                ->on('tbl_xe')
                ->onUpdate('cascade');
            $table->float('km_batdau');
            $table->float('km_cuoi');
            $table->date('ngay');
            $table->string('cayxang');
            $table->float('soluong');
            $table->float('dongia');
            $table->float('thanhtien');
            $table->string('ghichu', 255)->nullable();
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
        Schema::dropIfExists('tbl_phatsinhxe');
    }
}

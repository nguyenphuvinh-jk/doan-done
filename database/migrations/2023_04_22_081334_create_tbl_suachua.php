<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSuachua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_suachua', function (Blueprint $table) {
            $table->Increments('suachua_id');

            $table->integer('xe_id')->unsigned();
            $table->foreign('xe_id')
                ->references('xe_id')
                ->on('tbl_xe')
                ->onUpdate('cascade');

            $table->date('ngaysua');
            $table->text('noidung');
            $table->float('tongtien');
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
        Schema::dropIfExists('tbl_suachua');
    }
}

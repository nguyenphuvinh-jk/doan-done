<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCanhbaotaisan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_canhbaotaisan', function (Blueprint $table) {
            $table->Increments('canhbao_id');
            $table->date('ngay');
            $table->integer('xe_id')->unsigned();
            $table->foreign('xe_id')
                ->references('xe_id')
                ->on('tbl_xe')
                ->onUpdate('cascade');
            $table->float('km_hientai');
            $table->text('tinhtrang');
            $table->string('danhgia', 100);
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
        Schema::dropIfExists('tbl_canhbaotaisan');
    }
}

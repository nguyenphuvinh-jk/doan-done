<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBanglai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_banglai', function (Blueprint $table) {
            $table->Increments('banglai_id');
            $table->string('tenbanglai', 50);
            $table->string('taixe_id', 10);
            $table->foreign('taixe_id')
                ->references('taixe_id')
                ->on('tbl_taixe')
                ->onUpdate('cascade');
            $table->date('ngaycap');
            $table->date('ngayhethan');
            $table->string('donvicap', 255)->nullable();
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
        Schema::dropIfExists('tbl_banglai');
    }
}

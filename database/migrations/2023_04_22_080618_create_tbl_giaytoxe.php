<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblGiaytoxe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_giaytoxe', function (Blueprint $table) {
            $table->Increments('giayto_id');
            $table->integer('loaigiayto')->unsigned();
            $table->foreign('loaigiayto')
                ->references('id')
                ->on('tbl_loaigiayto')
                ->onUpdate('cascade');
            $table->integer('xe_id')->unsigned();
            $table->foreign('xe_id')
                ->references('xe_id')
                ->on('tbl_xe')
                ->onUpdate('cascade');
            $table->date('ngaycap');
            $table->date('ngayhethan');
            $table->string('donvicap', 255)->nullable();
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
        Schema::dropIfExists('tbl_giaytoxe');
    }
}

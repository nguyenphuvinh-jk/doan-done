<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHopdong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hopdong', function (Blueprint $table) {
            $table->string('hd_id',10)->primary();
            $table->string('ten_kh', 10);
            $table->foreign('ten_kh')
                ->references('kh_id')
                ->on('tbl_khachhang')
                ->onUpdate('cascade');
            $table->date('ngaybatdau_hd');
            $table->date('ngayhethan_hd');
            $table->text('noidung_hd')->nullable();
            $table->integer('trangthai_hd')->default(0);
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
        Schema::dropIfExists('tbl_hopdong');
    }
}

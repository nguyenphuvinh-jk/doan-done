<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_donhang', function (Blueprint $table) {
            $table->string('dh_id',10)->primary();

            $table->string('donvi');
            $table->foreign('donvi')
                ->references('kh_id')
                ->on('tbl_khachhang')
                ->onUpdate('cascade');

            $table->date('ngaydat');

            $table->integer('mathang')->unsigned();
            $table->foreign('mathang')
                ->references('loaihang_id')
                ->on('tbl_loaihang')
                ->onUpdate('cascade');

            $table->float('trongluong');

            $table->integer('donvitinh')->unsigned();
            $table->foreign('donvitinh')
                ->references('dvt_id')
                ->on('tbl_dvt')
                ->onUpdate('cascade');

            $table->integer('tuyenduong')->unsigned();
            $table->foreign('tuyenduong')
                ->references('tuyenduong_id')
                ->on('tbl_tuyenduong')
                ->onUpdate('cascade');

            $table->string('dd_layhang', 255);
            $table->string('dd_giaohang', 255);
            $table->string('tg_batdau', 20);
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->float('gioluuca')->nullable();
            $table->integer('trangthai_dh')->default(0);
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
        Schema::dropIfExists('tbl_donhang');
    }
}

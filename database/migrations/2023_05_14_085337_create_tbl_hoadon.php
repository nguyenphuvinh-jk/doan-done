<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hoadon', function (Blueprint $table) {
            $table->Increments('hoadon_id');

            $table->string('donhang_id', 10);
            $table->foreign('donhang_id')
                ->references('dh_id')
                ->on('tbl_donhang')
                ->onUpdate('cascade');

            $table->float('phithuexe')->nullable();
            $table->float('phinang')->nullable();
            $table->float('phiha')->nullable();
            $table->float('phigiayto')->nullable();
            $table->float('philuuca')->nullable();
            $table->float('vecauduong')->nullable();
            $table->float('phikhac')->nullable();
            $table->float('thue')->nullable();
            $table->float('tongtien')->nullable();
            $table->string('ghichu', 255)->nullable();
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
        Schema::dropIfExists('tbl_hoadon');
    }
}

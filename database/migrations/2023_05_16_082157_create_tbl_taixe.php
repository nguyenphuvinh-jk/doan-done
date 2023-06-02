<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTaixe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_taixe', function (Blueprint $table) {
            $table->string('taixe_id',10)->primary();
            $table->string('ten_taixe', 50);
            $table->date('ngaysinh');
            $table->string('sdt', 20);
            $table->string('diachi')->nullable();
            $table->string('CCCD', 20)->nullable()->unique();
            $table->string('tknh', 20)->nullable();
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
        Schema::dropIfExists('tbl_taixe');
    }
}

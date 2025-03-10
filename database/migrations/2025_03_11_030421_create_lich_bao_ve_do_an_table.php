<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('lich_bao_ve_do_an', function (Blueprint $table) {
            $table->id();
            $table->string('ma_do_an', 20);
            $table->dateTime('ngay_gio');
            $table->string('dia_diem', 255);
            $table->foreign('ma_do_an')->references('ma_do_an')->on('do_an')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lich_bao_ve_do_an');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('nhan_xet_bao_cao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ma_bao_cao');
            $table->text('noi_dung');
            $table->foreign('ma_bao_cao')->references('id')->on('bao_cao_do_an')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nhan_xet_bao_cao');
    }
};

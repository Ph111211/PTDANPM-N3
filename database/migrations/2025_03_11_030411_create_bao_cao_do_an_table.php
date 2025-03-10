<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bao_cao_do_an', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de', 255);
            $table->text('noi_dung');
            $table->string('ma_do_an', 20);
            $table->foreign('ma_do_an')->references('ma_do_an')->on('do_an')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bao_cao_do_an');
    }
};

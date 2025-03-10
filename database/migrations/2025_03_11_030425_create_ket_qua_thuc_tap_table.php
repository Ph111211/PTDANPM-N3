<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ket_qua_thuc_tap', function (Blueprint $table) {
            $table->string('ma_ket_qua', 20)->primary();
            $table->string('ma_sv', 20);
            $table->foreign('ma_sv')->references('ma_sv')->on('sinh_vien')->onDelete('cascade');
            $table->float('diem_so')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ket_qua_thuc_tap');
    }
};

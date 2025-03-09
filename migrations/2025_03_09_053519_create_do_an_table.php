<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('do_an', function (Blueprint $table) {
            $table->string('ma_do_an', 20)->primary();
            $table->string('tieu_de', 255);
            $table->text('mo_ta')->nullable();
            $table->date('thoi_gian_bat_dau');
            $table->date('thoi_gian_ket_thuc');
            $table->string('ma_sv', 20);
            $table->string('ma_gv', 20);
            $table->string('ma_dn', 20);
            $table->enum('trang_thai', ['Chưa hoàn thành', 'Hoàn thành']);
            $table->float('diem_so')->nullable();
            $table->foreign('ma_sv')->references('ma_sv')->on('sinh_vien')->onDelete('cascade');
            $table->foreign('ma_gv')->references('ma_gv')->on('giang_vien')->onDelete('cascade');
            $table->foreign('ma_dn')->references('ma_dn')->on('doanh_nghiep')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('do_an');
    }
};


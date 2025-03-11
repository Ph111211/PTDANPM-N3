<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('ket_qua_thuc_tap', function (Blueprint $table) {
            $table->string('ma_ket_qua', 20)->primary();
            $table->string('ma_sv', 20);
            $table->string('ma_dn', 20);
            $table->string('ma_gv', 20);
            $table->string('ma_do_an', 20);
            $table->float('diem_so')->nullable();
            $table->text('nhan_xet_cua_giang_vien')->nullable();
            $table->text('nhan_xet_cua_doanh_nghiep')->nullable();
            $table->foreign('ma_sv')->references('ma_sv')->on('sinh_vien')->onDelete('cascade');
            $table->foreign('ma_dn')->references('ma_dn')->on('doanh_nghiep')->onDelete('cascade');
            $table->foreign('ma_gv')->references('ma_gv')->on('giang_vien')->onDelete('cascade');
            $table->foreign('ma_do_an')->references('ma_do_an')->on('do_an')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('ket_qua_thuc_tap');
    }
};


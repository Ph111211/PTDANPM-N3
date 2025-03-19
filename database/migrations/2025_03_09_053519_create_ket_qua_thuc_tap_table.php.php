<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('ket_qua_thuc_tap', function (Blueprint $table) {
            $table->string('ma_ket_qua', 20)->primary();
            $table->unsignedBigInteger('ma_sv');
            $table->unsignedBigInteger('ma_gv');
            $table->float('diem_so')->nullable();
            $table->text('nhan_xet_cua_giang_vien')->nullable();
            $table->text('nhan_xet_cua_doanh_nghiep')->nullable();
            $table->string('ten_dn');// ten doanh nghiep
            $table->foreign('ma_sv')->references('user_id')->on('sinh_vien')->onDelete('cascade');
            $table->foreign('ma_gv')->references('user_id')->on('giang_vien')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('ket_qua_thuc_tap');
    }
};

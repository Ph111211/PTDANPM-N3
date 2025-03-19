<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('ket_qua_thuc_tap', function (Blueprint $table) {
            $table->id('ma_ket_qua');
            $table->unsignedBigInteger('ma_sv')->nullable();
            $table->unsignedBigInteger('ma_gv')->nullable();
            
            $table->float('diem_so')->nullable();
            $table->text('nhan_xet_cua_giang_vien')->nullable();
            $table->text('nhan_xet_cua_doanh_nghiep')->nullable();
            $table->string('ten_dn');// ten doanh nghiep

            $table->foreign('ma_sv')->references('user_id')->on('sinh_vien')->onDelete('set null');
            $table->foreign('ma_gv')->references('user_id')->on('giang_vien')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('ket_qua_thuc_tap');
    }
};


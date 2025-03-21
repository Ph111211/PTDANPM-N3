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
            $table->unsignedBigInteger('ma_sv');
            $table->unsignedBigInteger('ma_gv')->nullable(); // Cho phép NULL
            $table->text('nhan_xet')->nullable();
            $table->date('ngay_gio');
            $table->string('dia_diem', 255);
            $table->string('file_noi_dung');
            $table->enum('trang_thai', ['Chưa hoàn thành', 'Hoàn thành']);
            $table->float('diem_so')->nullable();

            $table->foreign('ma_sv')->references('user_id')->on('sinh_vien')->onDelete('cascade');
            $table->foreign('ma_gv')->references('user_id')->on('giang_vien')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('do_an');
    }
};

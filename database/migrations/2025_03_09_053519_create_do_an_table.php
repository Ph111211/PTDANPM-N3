<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('do_an', function (Blueprint $table) {
            $table->id('ma_do_an');
            $table->string('tieu_de', 255);
            $table->text('mo_ta')->nullable();
            $table->date('thoi_gian_bat_dau')->nullable();
            $table->date('thoi_gian_ket_thuc')->nullable();
            $table->unsignedBigInteger('ma_sv')->nullable();
            $table->unsignedBigInteger('ma_gv')->nullable();
            $table->text('nhan_xet')->nullable();
            $table->dateTime('ngay_gio')->nullable();
            $table->string('dia_diem', 255)->nullable();
            $table->string('file_noi_dung')->nullable();// thay vi ghi noi dung bao cao o day thi minh se luu file bao cao
            $table->enum('trang_thai', ['Chưa hoàn thành', 'Hoàn thành','Chưa có đề tài',"Đã chấm điểm","Đang mở","Đóng","Chậm tiến độ","Cảnh cáo lần 1","Cảnh cáo lần 2", "Hủy đồ án"]);
            $table->float('diem_so')->nullable();
            $table->string('nhiem_vu', 255)->nullable();
            $table->text('mo_ta_nhiem_vu')->nullable();
            
            $table->foreign('ma_sv')->references('user_id')->on('sinh_vien')->onDelete('set null');
            $table->foreign('ma_gv')->references('user_id')->on('giang_vien')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('do_an');
    }
};


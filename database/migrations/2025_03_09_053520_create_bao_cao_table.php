<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('bao_cao', function (Blueprint $table) {
            $table->id('ma_bao_cao');
            $table->string('tieu_de', 255);
            $table->text('noi_dung');
            $table->string('ma_do_an', 20);
            $table->string('nguoi_tao', 255);
            $table->date('ngay_tao');
            $table->enum('trang_thai', ['Chờ duyệt', 'Đã duyệt', 'Bị từ chối'])->default('Chờ duyệt');
            $table->foreign('ma_do_an')->references('ma_do_an')->on('do_an')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('bao_cao');
    }
};


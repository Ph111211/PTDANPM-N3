<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bao_cao_do_an', function (Blueprint $table) {
            $table->id();
            $table->string('ma_bao_cao', 20)->unique();
            $table->string('tieu_de', 255);
            $table->text('noi_dung');
            $table->string('ma_do_an', 20);
            $table->string('nguoi_tao', 255);
            $table->date('ngay_tao');
            $table->enum('trang_thai', ['Chờ duyệt', 'Đã duyệt', 'Bị từ chối'])->default('Chờ duyệt');
            $table->timestamps();

            $table->foreign('ma_do_an')->references('ma_do_an')->on('do_an');
        });
    }

    public function down() {
        Schema::dropIfExists('bao_cao_do_an');
    }
};

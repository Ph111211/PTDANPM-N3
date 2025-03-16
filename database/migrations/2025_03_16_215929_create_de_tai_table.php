<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('de_tai', function (Blueprint $table) {
            $table->id();
            $table->string('ma_gv');
            $table->string('ten_de_tai');
            $table->text('mo_ta')->nullable();
            $table->date('ngay_dong');
            $table->integer('so_luong_toi_da');
            $table->integer('so_luong_hien_tai')->default(0);
            $table->enum('trang_thai', ['mở', 'đóng'])->default('mở');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('de_tai');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lich_bao_ve', function (Blueprint $table) {
            $table->string('ma_do_an', 20);
            $table->string('ma_sv', 20);
            $table->date('ngay_gio');
            $table->string('dia_diem', 255);
            $table->string('giam_khao', 20);
            $table->foreign('ma_do_an')->references('ma_do_an')->on('do_an')->onDelete('cascade');
            $table->foreign('ma_sv')->references('ma_sv')->on('sinh_vien')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_bao_ve');
    }
};

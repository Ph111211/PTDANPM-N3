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
        Schema::create('diem_do_an', function (Blueprint $table) {
            $table->string('ma_do_an', 20);
            $table->string('ma_sv', 20);
            $table->string('ma_gv', 20);
            $table->string('loai_diem',20);
            $table->float('diem_so');
            $table->foreign('ma_do_an')->references('ma_do_an')->on('do_an')->onDelete('cascade');
            $table->foreign('ma_sv')->references('ma_sv')->on('sinh_vien')->onDelete('cascade');
            $table->foreign('ma_gv')->references('ma_gv')->on('giang_vien')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diem_do_an');
    }
};

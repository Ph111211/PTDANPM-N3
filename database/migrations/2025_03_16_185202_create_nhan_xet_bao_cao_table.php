<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('nhan_xet_bao_cao', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nhan_xet', 20)->unique();
            $table->string('ma_bao_cao', 20);
            $table->string('ma_gv', 20)->nullable();
            $table->text('noi_dung')->nullable();
            $table->string('ma_dn', 20)->nullable();
            $table->text('nhan_xet')->nullable();
            $table->timestamps();

            $table->foreign('ma_bao_cao')->references('ma_bao_cao')->on('bao_cao_do_an');
            $table->foreign('ma_gv')->references('ma_gv')->on('giang_vien');
            $table->foreign('ma_dn')->references('ma_dn')->on('doanh_nghiep');
        });
    }
    public function down() {
        Schema::dropIfExists('nhan_xet_bao_cao');
    }
};

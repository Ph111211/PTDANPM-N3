<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->string('ma_sv', 20)->primary();
            $table->string('ho_ten', 100);
            $table->date('ngay_sinh');
            $table->enum('gioi_tinh', ['Nam', 'Nữ']);
            $table->string('lop', 20);
            $table->string('sdt', 15);
            $table->string('email', 100)->unique();
            $table->text('dia_chi');
            $table->string('ma_gv', 20)->nullable();
            $table->string('ma_dn', 20)->nullable();
            $table->foreign('ma_gv')->references('ma_gv')->on('giang_vien')->onDelete('set null');
            $table->foreign('ma_dn')->references('ma_dn')->on('doanh_nghiep')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sinh_vien');
    }
};

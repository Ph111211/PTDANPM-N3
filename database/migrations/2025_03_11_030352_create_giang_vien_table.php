<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('giang_vien', function (Blueprint $table) {
            $table->string('ma_gv', 20)->primary();
            $table->string('ho_ten', 100);
            $table->string('khoa', 100);
            $table->string('sdt', 15);
            $table->string('email', 100)->unique();
            $table->integer('so_luong_sinh_vien_huong_dan')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('giang_vien');
    }
};


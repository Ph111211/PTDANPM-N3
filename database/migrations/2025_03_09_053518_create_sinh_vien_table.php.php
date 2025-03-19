<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique()->primary();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ho_ten', 100);
            $table->date('ngay_sinh');
            $table->enum('gioi_tinh', ['Nam', 'Nữ']);
            $table->string('lop', 20);
            $table->string('sdt', 15);
            $table->string('email', 100)->unique();
            $table->text('dia_chi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sinh_vien');
    }
};


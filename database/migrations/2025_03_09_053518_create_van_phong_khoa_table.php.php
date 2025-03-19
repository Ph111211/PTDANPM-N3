<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('van_phong_khoa', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique()->primary();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ho_ten', 100);
            $table->string('chuc_vu', 100);
            $table->string('sdt', 15);
            $table->string('email', 100)->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('van_phong_khoa');
    }
};

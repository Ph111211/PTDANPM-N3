<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->id();
            $table->string('ma', 100)->unique();
            $table->string('ho_ten', 100);
            $table->string('email', 100)->unique();
            $table->string('vai_tro', 20);
            $table->string('sdt', 15)->unique()->nullable();
            $table->string('mat_khau', 255);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('tai_khoan');
    }
};

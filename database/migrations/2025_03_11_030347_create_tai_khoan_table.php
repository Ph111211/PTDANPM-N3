<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->id();
            $table->string('ma', 20)->unique();
            $table->string('ho_ten', 100);
            $table->string('email', 100)->unique();
            $table->enum('vai_tro', ['Sinh viên', 'Giảng viên']);
            $table->string('sdt', 15);
            $table->string('mat_khau', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoan');
    }
};

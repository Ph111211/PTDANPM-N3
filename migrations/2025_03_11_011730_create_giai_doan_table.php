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
        Schema::create('giai_doan', function (Blueprint $table) {
            $table->string('ma_ke_hoach')->primary();
            $table->string('giai_doan',20);
            $table->string('mo_ta',20)->nullable();
            $table->date('thoi_gian_bat_dau');
            $table->date('thoi_gian_ket_thuc');
            $table->enum('trang_thai', ['Chờ duyệt', 'Đã duyệt', 'Bị từ chối'])->default('Chờ duyệt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giai_doan');
    }
};

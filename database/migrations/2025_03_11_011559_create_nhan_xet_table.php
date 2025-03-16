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
        Schema::create('nhan_xet', function (Blueprint $table) {
            $table->string('ma_nhan_xet', 20)->primary();
            $table->string('ma_gv', 20);
            $table->text('noi_dung')->nullable();
            $table->string('ma_dn', 20);
            $table->text('nhan_xet')->nullable();
            $table->foreign('ma_gv')->references('ma_gv')->on('giang_vien')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_xet');
    }
};

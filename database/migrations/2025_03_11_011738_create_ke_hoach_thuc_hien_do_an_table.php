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
        Schema::create('ke_hoach_thuc_hien_do_an', function (Blueprint $table) {
            $table->string('ma_do_an',20)->primary();
            $table->string('ma_ke_hoach',20);
            $table->integer('giai_doan');
            $table->foreign('ma_ke_hoach')->references('ma_ke_hoach')->on('giai_doan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ke_hoach_thuc_hien_do_an');
    }
};

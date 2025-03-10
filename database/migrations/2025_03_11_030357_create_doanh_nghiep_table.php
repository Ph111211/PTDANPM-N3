<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('doanh_nghiep', function (Blueprint $table) {
            $table->string('ma_dn', 20)->primary();
            $table->string('ten_dn', 255);
            $table->text('dia_chi');
            $table->string('sdt', 15);
            $table->string('email', 100)->unique();
            $table->string('nguoi_lien_he', 100);
            $table->integer('so_luong_sinh_vien_tiep')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doanh_nghiep');
    }
};

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,  // Giảng viên phải có trước để Sinh viên tham chiếu
            GiangVienSeeder::class,  // Giảng viên phải có trước để Sinh viên tham chiếu
            SinhVienSeeder::class,  // Giờ mới tạo Sinh viên
            VanPhongKhoaSeeder::class,  // Giờ mới tạo Sinh viên
            DoAnSeeder::class,
            KetQuaThucTapSeeder::class
        ]);

    }
}

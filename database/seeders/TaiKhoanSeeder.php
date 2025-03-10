<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class TaiKhoanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('tai_khoan')->insert([
                'ma' => ($i % 2 == 0) ? 'GV00' . $i : 'SV00' . $i, // Mã định danh
                'ho_ten' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'vai_tro' => ($i % 2 == 0) ? 'Giảng viên' : 'Sinh viên', // Phân chia vai trò
                'sdt' => $faker->numerify('09########'), // Tạo số điện thoại hợp lệ
                'mat_khau' => $faker->numerify('Tlu@######'), // Mã hóa mật khẩu mặc định
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

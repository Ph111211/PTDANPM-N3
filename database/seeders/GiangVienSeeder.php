<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GiangVienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('giang_vien')->insert([ // Sửa tên bảng thành giang_viens
                'ma_gv' => $faker->unique()->regexify('GV[0-9]{4}'),
                'ho_ten' => $faker->name,
                'khoa' => $faker->randomElement(['Công nghệ thông tin', 'Điện tử', 'Cơ khí']),
                'sdt' => $faker->numerify('09########'), // Tạo số điện thoại hợp lệ
                'email' => $faker->unique()->safeEmail,
                'so_luong_sinh_vien_huong_dan' => $faker->numberBetween(0, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

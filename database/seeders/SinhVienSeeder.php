<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SinhVienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lấy danh sách mã giảng viên và mã doanh nghiệp đã tạo
        $giangViens = DB::table('giang_vien')->pluck('ma_gv')->toArray();
        $doanhNghieps = DB::table('doanh_nghiep')->pluck('ma_dn')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('sinh_vien')->insert([
                'ma_sv' => $faker->unique()->regexify('[A-Z]{2}[0-9]{6}'),
                'ho_ten' => $faker->name,
                'ngay_sinh' => $faker->date(),
                'gioi_tinh' => $faker->randomElement(['Nam', 'Nữ']),
                'lop' => $faker->randomElement(['DH1A', 'DH2B', 'CNTT3C']),
                'sdt' => $faker->numerify('09########'),
                'email' => $faker->unique()->safeEmail,
                'dia_chi' => $faker->address,
                'ma_gv' => $faker->optional()->randomElement($giangViens), // Gán mã giảng viên ngẫu nhiên
                'ma_dn' => $faker->optional()->randomElement($doanhNghieps), // Gán mã doanh nghiệp ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

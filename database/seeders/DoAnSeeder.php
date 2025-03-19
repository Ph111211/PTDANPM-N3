<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DoAnSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $sinhViens = DB::table('sinh_vien')->pluck('ma_sv')->toArray();
        $giangViens = DB::table('giang_vien')->pluck('ma_gv')->toArray();
        $doanhNghieps = DB::table('doanh_nghiep')->pluck('ma_dn')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('do_an')->insert([
                'ma_do_an' => $faker->unique()->regexify('DA[0-9]{4}'),
                'tieu_de' => $faker->sentence,
                'mo_ta' => $faker->paragraph,
                'thoi_gian_bat_dau' => $faker->dateTimeBetween('-1 year', 'now'),
                'thoi_gian_ket_thuc' => $faker->dateTimeBetween('now', '+1 year'),
                'ma_sv' => $faker->randomElement($sinhViens),
                'ma_gv' => $faker->randomElement($giangViens),
                'ma_dn' => $faker->optional()->randomElement($doanhNghieps),
                'trang_thai' => $faker->randomElement(['Chưa hoàn thành', 'Hoàn thành']),
                'diem_so' => $faker->optional()->randomFloat(1, 0, 10),
                'ngay_bao_ve' => $faker->dateTimeBetween('now', '+1 year'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

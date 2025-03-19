<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KetQuaThucTapSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $sinhViens = DB::table('sinh_vien')->pluck('ma_sv')->toArray();
        $doanhNghieps = DB::table('doanh_nghiep')->pluck('ma_dn')->toArray();
        $giangViens = DB::table('giang_vien')->pluck('ma_gv')->toArray();
        $doAns = DB::table('do_an')->pluck('ma_do_an')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('ket_qua_thuc_tap')->insert([
                'ma_ket_qua' => $faker->unique()->regexify('KQ[0-9]{4}'),
                'ma_sv' => $faker->randomElement($sinhViens),
                'ma_dn' => $faker->randomElement($doanhNghieps),
                'ma_gv' => $faker->randomElement($giangViens),
                'ma_do_an' => $faker->randomElement($doAns),
                'diem_so' => $faker->optional()->randomFloat(1, 0, 10),
                'nhan_xet_cua_giang_vien' => $faker->optional()->paragraph,
                'nhan_xet_cua_doanh_nghiep' => $faker->optional()->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

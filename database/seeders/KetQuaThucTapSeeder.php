<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KetQuaThucTap;
use App\Models\SinhVien;
use App\Models\GiangVien;
use Faker\Factory as Faker;

class KetQuaThucTapSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $sinhViens = SinhVien::all();
        $giangViens = GiangVien::all();

        foreach ($sinhViens as $sinhVien) {
            $giangVien = $giangViens->random();

            KetQuaThucTap::create([
                'ma_ket_qua' => 'KQ' . $faker->unique()->randomNumber(5),
                'ma_sv' => $sinhVien->user_id,
                'ma_gv' => $giangVien->user_id,
                'diem_so' => $faker->randomFloat(5, 7, 10),
                'nhan_xet_cua_giang_vien' => $faker->sentence,
                'nhan_xet_cua_doanh_nghiep' => $faker->sentence,
                'ten_dn' => $faker->company,
            ]);
        }
    }
}


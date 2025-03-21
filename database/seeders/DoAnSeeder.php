<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoAn;
use App\Models\SinhVien;
use App\Models\GiangVien;
use Faker\Factory as Faker;

class DoAnSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $sinhViens = SinhVien::take(10)->get(); // Lấy 10 sinh viên đầu tiên
        $giangViens = GiangVien::all();

        $tyLeGanGiangVien = 60; // Thay đổi tỷ lệ phần trăm ở đây

        foreach ($sinhViens as $sinhVien) {
            $maGv = null;

            if ($faker->boolean($tyLeGanGiangVien)) {
                $giangVien = $giangViens->random();
                $maGv = $giangVien->user_id;
            }

            DoAn::create([
                'ma_do_an' => 'DA' . $faker->unique()->randomNumber(5),
                'tieu_de' => $faker->sentence,
                'mo_ta' => $faker->paragraph,
                'thoi_gian_bat_dau' => $faker->date,
                'thoi_gian_ket_thuc' => $faker->date,
                'ma_sv' => $sinhVien->user_id,
                'ma_gv' => $maGv,
                'nhan_xet' => $faker->sentence,
                'ngay_gio' => $faker->date,
                'dia_diem' => $faker->address,
                'file_noi_dung' => 'do_an_' . $sinhVien->user_id . '.pdf',
                'trang_thai' => $faker->randomElement(['Chưa hoàn thành', 'Hoàn thành']),
                'diem_so' => $faker->randomFloat(5, 7, 10),
            ]);
        }
    }
}

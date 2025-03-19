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
        $sinhViens = SinhVien::all();
        $giangViens = GiangVien::all();

        foreach ($sinhViens as $sinhVien) {
            $giangVien = $giangViens->random();

            DoAn::create([
                'ma_do_an' => 'DA' . $faker->unique()->randomNumber(5),
                'tieu_de' => $faker->sentence,
                'mo_ta' => $faker->paragraph,
                'thoi_gian_bat_dau' => $faker->date,
                'thoi_gian_ket_thuc' => $faker->date,
                'ma_sv' => $sinhVien->user_id,
                'ma_gv' => $giangVien->user_id,
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

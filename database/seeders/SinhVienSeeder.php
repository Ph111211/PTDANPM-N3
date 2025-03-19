<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SinhVien;
use App\Models\User;
use Faker\Factory as Faker;

class SinhVienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $sinhViens = User::where('role', 'student')->get();

        foreach ($sinhViens as $user) {
            SinhVien::create([
                'user_id' => $user->id,
                'ho_ten' => $user->name,
                'ngay_sinh' => $faker->date,
                'gioi_tinh' => $faker->randomElement(['Nam', 'Nữ']),
                'lop' => 'IT' . $faker->randomNumber(3),
                'sdt' => '098' . $faker->numerify('#######'),
                'email' => $user->email,
                'dia_chi' => $faker->address,
            ]);
        }
    }
}

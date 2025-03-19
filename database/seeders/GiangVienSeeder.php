<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiangVien;
use App\Models\User;
use Faker\Factory as Faker;

class GiangVienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $giangViens = User::where('role', 'lecture')->get();

        foreach ($giangViens as $user) {
            GiangVien::create([
                'user_id' => $user->id,
                'ho_ten' => $user->name,
                'khoa' => $faker->word,
                'sdt' => '098' . $faker->numerify('#######'),
                'email' => $user->email,
                'so_luong_sinh_vien_huong_dan' => $faker->numberBetween(0, 20),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiangVien;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class GiangVienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Đảm bảo có ít nhất 10 người dùng giảng viên
        $giangViensUsers = User::where('role', 'lecture')->take(10)->get();

        // Nếu không đủ 10, tạo thêm người dùng giảng viên
        if ($giangViensUsers->count() < 10) {
            $count = 10 - $giangViensUsers->count();
            for ($i = 0; $i < $count; $i++) {
                $user = User::create([
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'password' => Hash::make('password'), // Mật khẩu mặc định
                    'role' => 'lecture',
                ]);
                $giangViensUsers->push($user);
            }
        }

        foreach ($giangViensUsers as $user) {
            GiangVien::create([
                'user_id' => $user->id,
                'ho_ten' => $user->name,
                'khoa' => $faker->word,
                'sdt' => '098' . $faker->numerify('#######'),
                'email' => $user->email,
                'so_luong_sinh_vien_huong_dan' => $faker->numberBetween(4, 11),
            ]);
        }
    }
}

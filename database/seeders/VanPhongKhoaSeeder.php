<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VanPhongKhoa;
use App\Models\User;
use Faker\Factory as Faker;

class VanPhongKhoaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $user) {
            VanPhongKhoa::create([
                'user_id' => $user->id,
                'ho_ten' => $user->name,
                'chuc_vu' => $faker->jobTitle,
                'sdt' => '098' . $faker->numerify('#######'),
                'email' => $user->email,
            ]);
        }
    }
}

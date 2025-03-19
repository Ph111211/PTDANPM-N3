<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DoanhNghiepSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('doanh_nghiep')->insert([
                'ma_dn' => $faker->unique()->regexify('DN[0-9]{4}'),
                'ten_dn' => $faker->company,
                'dia_chi' => $faker->address,
                'sdt' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'nguoi_lien_he' => $faker->name,
                'so_luong_sinh_vien_tiep' => $faker->numberBetween(0, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

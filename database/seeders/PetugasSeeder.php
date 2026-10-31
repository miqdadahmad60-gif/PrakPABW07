<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 1 Akun Admin Tetap BPBD
        User::create([
            'name' => 'Admin BPBD Bandung',
            'email' => 'admin@bpbd.bandungkab.go.id',
            'password' => Hash::make('password123'),
        ]);

        // 2. Buat minimal 5 akun dummy menggunakan Faker (locale id_ID)
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employees; // Pastikan Anda mengimpor model Employees
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Menggunakan Faker untuk menghasilkan data dummy

        // Membuat 10 data dummy untuk tabel employees
        for ($i = 0; $i < 10; $i++) {
            Employees::create([
                'user_id' => $faker->randomDigitNotNull, // Ganti dengan ID pengguna yang valid
                'depart_id' => $faker->randomDigitNotNull, // Ganti dengan ID departemen yang valid
                'address' => $faker->address,
                'place_of_birth' => $faker->city,
                'dob' => $faker->date(),
                'religion' => $faker->word,
                'sex' => $faker->randomElement(['Male', 'Female']),
                'phone' => $faker->phoneNumber,
                'salary' => $faker->randomFloat(2, 3000, 8000), // Gaji acak antara 3000 dan 8000
                'photo' => null, // Ganti jika ada gambar yang ingin diupload
            ]);
        }
    }
}

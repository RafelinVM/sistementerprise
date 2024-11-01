<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payroll;
use App\Models\User;
use App\Models\Departments;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua user dan department dari database
        $users = User::all();
        $departments = Departments::all();

        // Periksa apakah ada user dan department
        if ($users->isEmpty() || $departments->isEmpty()) {
            $this->command->info('Tidak ada user atau department untuk disambungkan.');
            return;
        }

        // Lakukan perulangan dan buat data payroll secara acak
        foreach ($users as $user) {
            Payroll::create([
                'user_id' => $user->id, // Assign user
                'department_id' => $departments->random()->id, // Assign random department
                'salary' => rand(3000000, 10000000), // Gaji acak antara 3 juta hingga 10 juta
            ]);
        }

        $this->command->info('Payroll seeder berhasil diisi.');
    }
}

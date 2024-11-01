<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Payroll;
use Illuminate\Database\Seeder;
use Database\Seeders\DepartmentsSeeder;
use Database\Seeders\EmployeeSeeder; // Import EmployeeSeeder
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            DepartmentsSeeder::class,
            EmployeeSeeder::class, // Tambahkan EmployeeSeeder di sini
            PayrollSeeder::class,
        ]);
    }
}

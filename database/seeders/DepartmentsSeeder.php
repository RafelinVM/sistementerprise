<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department; // Pastikan untuk mengimpor model Department
use App\Models\Departments;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data departemen
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => 'Manage recruitment, training, and employee welfare.',
            ],
            [
                'name' => 'Finance',
                'description' => 'Responsible for financial planning and management.',
            ],
            [
                'name' => 'IT Support',
                'description' => 'Provides technical support and manages IT infrastructure.',
            ],
            [
                'name' => 'Marketing',
                'description' => 'Handles marketing strategies and promotions.',
            ],
            [
                'name' => 'Sales',
                'description' => 'Manages sales operations and client relationships.',
            ],
        ];

        // Menyimpan data ke dalam tabel departments
        foreach ($departments as $department) {
            Departments::updateOrCreate(
                ['name' => $department['name']], // Mencari berdasarkan nama
                ['description' => $department['description']] // Menyimpan deskripsi
            );
        }
    }
}

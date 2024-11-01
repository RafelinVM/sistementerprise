<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat atau memperbarui pengguna 'adi'
        $adi = User::updateOrCreate(
            ['email' => 'adi@email.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'adi',
                'password' => bcrypt('password'),
            ]
        );
        $adi->assignRole('admin'); // Pastikan role 'admin' sudah ada

        // Membuat atau memperbarui pengguna 'budi'
        $budi = User::updateOrCreate(
            ['email' => 'budi@email.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'Budi',
                'password' => bcrypt('password'),
            ]
        );
        $budi->assignRole('operator'); // Pastikan role 'operator' sudah ada

        // Membuat atau memperbarui pengguna 'cindy'
        $cindy = User::updateOrCreate(
            ['email' => 'cindy@email.com'], // Kondisi pencarian berdasarkan email
            [
                'name' => 'cindy',
                'password' => bcrypt('password'),
            ]
        );
        $cindy->assignRole('operator'); // Pastikan role 'operator' sudah ada
        $cindy->givePermissionTo('delete users'); // Pastikan permission 'delete users' sudah ada
    }
}

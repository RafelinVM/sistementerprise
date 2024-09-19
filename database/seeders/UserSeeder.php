<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Memastikan role ada sebelum digunakan
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $operatorRole = Role::firstOrCreate(['name' => 'operator']);

        // Membuat pengguna dan menetapkan role
        $adi = User::updateOrCreate([
            'email' => 'adi@email.com'
        ], [
            'name' => 'adi',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id // Pastikan ada kolom role_id di tabel users
        ]);
        $adi->assignRole($adminRole);

        $budi = User::updateOrCreate([
            'email' => 'budi@email.com'
        ], [
            'name' => 'Budi',
            'password' => bcrypt('password'),
            'role_id' => $operatorRole->id // Pastikan ada kolom role_id di tabel users
        ]);
        $budi->assignRole($operatorRole);

        $cindy = User::updateOrCreate([
            'email' => 'cindy@email.com'
        ], [
            'name' => 'cindy',
            'password' => bcrypt('password'),
            'role_id' => $operatorRole->id // Pastikan ada kolom role_id di tabel users
        ]);
        $cindy->assignRole($operatorRole);
        $cindy->givePermissionTo('delete users'); // Memberikan permission tambahan langsung
    }
}

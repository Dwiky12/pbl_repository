<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Dosen User',
            'email' => 'dosen@example.com',
            'password' => Hash::make('password'),
            'id_role' => 2, // Menggunakan id_role
        ]);

        // Buat pengguna dengan role kaprodi
        User::create([
            'nama' => 'Kaprodi User',
            'email' => 'kaprodi@example.com',
            'password' => Hash::make('password'),
            'id_role' => 1, // Menggunakan id_role
        ]);
    }
}
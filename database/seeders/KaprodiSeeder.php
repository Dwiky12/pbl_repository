<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KaprodiSeeder extends Seeder {
    public function run() {
        User::create([
            'nama' => 'Kaprodi',
            'email' => 'kaprodi@example.com',
            'password' => Hash::make('1234'), // Gantilah password dengan yang sesuai
            'id_role' => 1, // Pastikan id_role 2 sesuai dengan role Kaprodi di tabel roles Anda
        ]);
    }
}
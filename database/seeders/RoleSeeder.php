<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['id_role' => 1, 'nama' => 'kaprodi']);
        Role::create(['id_role' => 2, 'nama' => 'dosen']);
    }
}
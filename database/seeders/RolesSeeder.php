<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class RolesSeeder extends Seeder { 
    public function run() { 
        DB::table('roles')->insert([ 
            ['id_role' => 1, 'nama' => 'Kaprodi'], 
            ['id_role' => 2, 'nama' => 'Dosen'], 
        ]); 
    } 
}
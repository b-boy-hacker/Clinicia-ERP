<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombres' => 'Sergio David',
            'email' => 'adm@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '1', 
            'rol' => 'Administrador', 
        ]);
    }
}

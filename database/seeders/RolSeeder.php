<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\UsuarioRol;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rol::create([         
        //     'rol' => 'Administrador'          
        // ]); 
        // Rol::create([         
        //     'rol' => 'Medico'          
        // ]);
        // Rol::create([         
        //     'rol' => 'Paciente'          
        // ]);

        // UsuarioRol::create([         
        //     'usuario_id' => '2',    
        //     'rol_id' => '2'            
        // ]);
        // UsuarioRol::create([         
        //     'usuario_id' => '3',    
        //     'rol_id' => '3'          
        // ]);
        DB::table('rols')->insert([
            'rol' => 'Administrador',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rols')->insert([
            'rol' => 'Medico',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rols')->insert([
            'rol' => 'Enfermera',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rols')->insert([
            'rol' => 'Paciente',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        
    }
}

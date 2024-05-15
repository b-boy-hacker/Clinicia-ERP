<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\UsuarioRol;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([         
            'rol' => 'Administrador'          
        ]); 
        Rol::create([         
            'rol' => 'Medico'          
        ]);
        Rol::create([         
            'rol' => 'Paciente'          
        ]);

        UsuarioRol::create([         
            'usuario_id' => '2',    
            'rol_id' => '2'            
        ]);
        UsuarioRol::create([         
            'usuario_id' => '3',    
            'rol_id' => '3'          
        ]);
        
    }
}

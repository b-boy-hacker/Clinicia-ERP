<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Especialidad;
use App\Models\Turno;
use App\Models\Horario;
use App\Models\Servicio;
use App\Models\MedicoHorario;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombres' => 'Sergio David',
            'ci' => '123',
            'apellido_paterno' => 'Cambara',
            'apellido_materno' => 'Dorbigny',
            'sexo' => 'Masculino',
            'telefono' => '74921968',
            'direccion' => 'Urb el Urubo',

            'email' => 'adm@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        // User::create([
        //     'nombres' => 'Eunice',
        //     'ci' => '124',
        //     'apellido_paterno' => 'Navarro',
        //     'apellido_materno' => 'Dorbigny',
        //     'sexo' => 'Femenino',
        //     'telefono' => '74921968',
        //     'direccion' => 'Urb el Urubo',

        //     'email' => 'eunice@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);
        // User::create([
        //     'nombres' => 'Yuliana',
        //     'ci' => '125',
        //     'apellido_paterno' => 'Baldiviezo',
        //     'apellido_materno' => 'Dorbigny',
        //     'sexo' => 'Femenino',
        //     'telefono' => '74921968',
        //     'direccion' => 'Urb el Urubo',

        //     'email' => 'yuli@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);
        // Especialidad::create([
        //     'nombre' => 'Ginecología',
            
        // ]);
        // Especialidad::create([
        //     'nombre' => 'Pediatría',        
        // ]);
        // Turno::create([
        //     'nombre' => 'mañana',        
        // ]);
        // Turno::create([
        //     'nombre' => 'tarde',        
        // ]);
        // Horario::create([
        //     'horaI' => '07:00:00', 
        //     'horaF' => '12:00:00',
        //     'dia' => 'Lunes',
        //     'id_turno' => '1',      
        // ]);
        // Horario::create([
        //     'horaI' => '14:00:00', 
        //     'horaF' => '18:00:00',
        //     'dia' => 'Lunes',
        //     'id_turno' => '2', 
        // ]);
        // MedicoHorario::create([
        //     'id_horario' => '1',
        //     'id_medico' => '2',
        //     'id_especialidades' => '1',            
        // ]);
        // MedicoHorario::create([            
        //     'id_horario' => '2',
        //     'id_medico' => '2',
        //     'id_especialidades' => '2', 
        // ]);
        
        // Servicio::create([            
        //     'tipo_servicio' => 'Ginecologia',
        //     'id_medico' => '2',
             
        // ]);
        // Servicio::create([            
        //     'tipo_servicio' => 'Pediatria',
        //     'id_medico' => '2', 
        // ]);
        
    }
}

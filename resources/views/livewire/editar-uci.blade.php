<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    
    <div>
       <x-label for="nro_historia" :value="__('Nro Historia Clinica')" />

       <x-text-input 
       id="nro_historia" 
       class="block mt-1 w-full" 
       type="text" 
       wire:model="nro_historia" 
       :value="old('nro_historia')" 
       required autofocus autocomplete="username"
       placeholder="Ingrese el número de historia clínica"
       />
       {{-- <x-input-error :messages="$errors->get('titulo')" class="mt-2" /> --}}

   </div>

   <div>
    <x-label for="name" :value="__('Nombre del Paciente')" />

        <select
            id="name"
            wire:model="name"
            required autocomplete="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
            focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 
            dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
        >
            <option>Seleccione el Paciente</option>
            @foreach ($pacientes as $paciente)
            <option value="{{$paciente->user->nombres}} {{$paciente->user->apellido_paterno}} 
                {{$paciente->user->apellido_materno}}">{{$paciente->user->nombres}} 
                {{$paciente->user->apellido_paterno }} {{$paciente->user->apellido_materno}}</option>
            @endforeach
        </select>
    </div>

   <div>
       <x-label for="categoria" :value="__('Nivel de Gravedad')" />

       <select
           id="categoria"
           wire:model="categoria"
           required autocomplete="categoria"
           class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
           focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 
           dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
       >
       <option value="">-------Selecciona un Nivel-------</option>
                <option value="Nivel 3 - Paciente con complejo requiere soporte respiratorio">Nivel 3 - Paciente con complejo requiere soporte respiratorio</option>
                <option value="Nivel 2 - Paciente requiere cuidados posoperatorios">Nivel 2 - Paciente requiere cuidados posoperatorios</option>
       </select>
   </div>

   <div>
    <x-label for="doctor" :value="__('Nombre de Doctor(a) Designado(a)')" />

    <select
        id="doctor"
        wire:model="doctor"
        required autocomplete="categoria"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
        focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 
        dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
    >
        <option>Seleccione Doctor(a)</option>
        @foreach ($doctores as $doctor )
        <option value="{{$doctor->user->nombres}} {{$doctor->user->apellido_paterno}} {{$doctor->user->apellido_materno}}">{{$doctor->user->nombres}} 
            {{$doctor->user->apellido_paterno }} {{$doctor->user->apellido_materno}}</option>
        @endforeach
    </select>
    </div>

   <div>
       <x-label for="ultimo_dia" :value="__('Fecha de Ingreso a UCI')" />

       <x-text-input 
       id="ultimo_dia" 
       class="block mt-1 w-full" 
       type="date" 
       wire:model="ultimo_dia" 
       :value="old('ultimo_dia')" 
       required autofocus autocomplete="username"
       />

   </div>

   <div>
       <x-label for="cuidados_intensivos" :value="__('Descripción del tratamiento')" />

       <textarea 

       wire:model="cuidados_intensivos" 
       placeholder="Descripción del tratamiento que se debe llevar"
       class="rounded-md shadow-sm border-gray-300 focus:border-ring-indigo-300 focus:ring
       focus:ring-indigo-200 focus:ring-opacity-50 w-full h-60"
       
       ></textarea>

   </div>

   

   <x-button>
       Guardar Cambios
   </x-button>
   {{-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearModal">
    Crear Horario
    </button> --}}
    {{-- <div class="form-group">
        <label for="horaI">Hora de Inicio:</label>
        <input type="time" class="form-control" id="horaI" name="horaI">
    </div> --}}

</form>

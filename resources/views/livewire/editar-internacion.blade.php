


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
                {{$paciente->user->apellido_materno}}">Paciente: {{$paciente->user->nombres}} 
                {{$paciente->user->apellido_paterno }} {{$paciente->user->apellido_materno}}</option>
            @endforeach
        </select>
    </div>


    <div>
        <x-label for="categoria" :value="__('Motivo de Internación')" />
 
        <select
            id="categoria"
            wire:model="categoria"
            required autocomplete="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
            focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 
            dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
        >
        <option value="">-------Selecciona un Motivo-------</option>
                 <option value="Cirugías programadas">Cirugías programadas</option>
                 <option value="Infecciones graves">Infecciones graves</option>
                 <option value="Accidentes y traumas">Accidentes y traumas</option>
                 <option value="Complicaciones del embarazo y parto">Complicaciones del embarazo y parto</option>
                 <option value="Condiciones cardíacas">Condiciones cardíacas</option>
                 <option value="Enfermedades respiratorias">Enfermedades respiratorias</option>
                 <option value="Problemas gastrointestinales">Problemas gastrointestinales</option>
                 <option value="Tratamiento del cáncer">Tratamiento del cáncer</option>
                 <option value="Enfermedades crónicas descompensadas">Enfermedades crónicas descompensadas</option>
                 <option value="Problemas neurológicos">Problemas neurológicos</option>
                 <option value="Desórdenes psiquiátricos">Desórdenes psiquiátricos</option>
                 <option value="Otros Motivos">Otros Motivos</option>
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
            <option value="{{$doctor->user->nombres}} {{$doctor->user->apellido_paterno}} {{$doctor->user->apellido_materno}}">Dr: {{$doctor->user->nombres}} 
                {{$doctor->user->apellido_paterno }} {{$doctor->user->apellido_materno}}</option>
            @endforeach
        </select>
        </div>
    

    <div>
        <x-label for="Enfermera" :value="__('Nombre de Enfermera(o) Designado(a)')" />
    
        <select
            id="enfermera"
            wire:model="enfermera"
            required autocomplete="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
            focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 
            dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
        >
            <option>Seleccione Enfemera(o)</option>
            @foreach ($enfermeras as $enfermera )
            <option value="{{$enfermera->user->nombres}} {{$enfermera->user->apellido_paterno}} {{$enfermera->user->apellido_materno}}">Enfermera: {{$enfermera->user->nombres}} 
                {{$enfermera->user->apellido_paterno }} {{$enfermera->user->apellido_materno}}</option>
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

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" wire:submit.prevent='crearInterno'>

    @foreach ( $pacientes as $paciente ) 
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between 
        md:items-center">
            <div class="space-y-3">
                <a href="#" class="text-2xl font-bold">
                    Paciente: {{$paciente->name}}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{$paciente->categoria}}</p>
                <p class="text-sm text-gray-500">Fecha de Ingreso: {{$paciente->ultimo_dia->format('d/m/Y')}} </p>
            </div>

            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                <a
                    href="{{ route('internacion.edit',$paciente->id)}}"
                    class="bg-blue-500 py-2 px-4 rounded-lg text-white text-xs font-bold text-center"
                >Editar</a>
                <button
                    wire:click="$dispatch('mostrarAlerta', {{ $paciente->id }})"
                    {{-- wire:click='$emit(prueba)' --}}
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center"
                >Eliminar</button>
            </div>
        </div>
    @endforeach

{{-- <div class="space-y-3">
    <x-button wire:submit.prevent='crearPaciente'>
        Registrar Paciente
    </x-button>
</div> --}}
</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta', pacienteId => {
        Swal.fire({
        title: "¿Eliminar Paciente?",
        text: "Un paciente eliminado no se puede recuperar!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Eliminar la vacante
            @this.call('eliminarPaciente', pacienteId)

            Swal.fire({
                title: "Se eliminó el Paciente!",
                text: "Eliminado Correctamente.",
                icon: "success"
            });
        }
    });
    })
</script>
@endpush

@extends('adminlte::page')
@section('content')
        <x-app-layout>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    @if(session()->has('mensaje'))
                        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
                            {{session('mensaje')}}
                        </div>
                    @endif
                    <h1 class="text-xl font-bold text-center mb-10 uppercase">Pacientes Internos</h1>
                    {{-- <livewire:mostrar-pacientes-uci /> --}}
                    <livewire:mostrar-internos />
                </div>
            </div>
        </x-app-layout>
    
@stop

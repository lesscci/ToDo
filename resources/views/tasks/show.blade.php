<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <a href="{{url()->previous()}}" class="btn btn-sm btn-info">Atrás</a><br>
                <b> El título de tu tarea es: </b> {{$task->titulo}}<br>
                <b> La descripción de tu tarea es: </b> {{$task->descripcion}}<br>
                <b> El estado de tu tarea es: </b> {{$task->state->states}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

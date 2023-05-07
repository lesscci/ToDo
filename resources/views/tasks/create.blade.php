<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Aplicacion de Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('tasks.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control" name="titulo">
                        </div>
                        <div class="mb-3">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="4" cols="30"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Estado</label>
                            <select name="states" class="form-control">
                                <option disabled selected>
                                    Seleccione Opcion
                                </option>
                                <option value="pendiente">Pendiente</option>
                                <option value="en_proceso">En proceso</option>
                                <option value="completada">Completada</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
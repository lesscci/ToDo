<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Tareas
        </h2>
    </x-slot>
    <style>
        #outer {
            width: auto;
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    @if (Session::has('alert-success'))

                    <div class="alert alert-success" role="alert">
                        {{(Session::get('alert-success'))}}
                    </div>
                    @endif
                    @if (Session::has('error'))

                    <div class="alert alert-danger" role="alert">
                        {{(Session::get('error'))}}
                    </div>
                    @endif

                    @if (count($tasks) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Título
                                </th>
                                <th>
                                    Descripcion
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>

                                </th>
                                <th>
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{$task->titulo}}</td>
                                <td>{{$task -> descripcion}} </td>
                                <td> {{$task->state->states}}</td>
                                <td>
                                    @if ($task->states_id == 1)
                                    <a class="btn btn-sm btn-warning" href=""> En proceso </a>
                                    <a class="btn btn-sm btn-success" href=""> Completar </a>
                                    @endif
                                    @if ($task->states_id == 2)
                                    <a class="btn btn-sm btn-primary" href=""> Pendiente </a>
                                    <a class="btn btn-sm btn-success" href=""> Completar </a>
                                    @endif
                                    @if ($task->states_id == 3)
                                    <a class="btn btn-sm btn-primary" href=""> Pendiente </a>
                                    <a class="btn btn-sm btn-warning" href=""> En proceso </a>
                                    @endif


                                </td>
                                <td id="outer">
                                    <a class="inner btn btn-sm btn-success" href="{{route('tasks.show', $task->id )}}">Ver </a>
                                    <a class="inner btn btn-sm btn-success" href="">Editar </a>
                                    <a class=" inner btn btn-sm btn-danger" href="">Borrar </a>


                                    <form action="" class="inner">
                                        <input type="hidden" name="task_id" value="{{$task->id}}">
                                        <input type="submit" class="btn btn-sm btn-info">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h4> No hay tareas hechas todavía</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
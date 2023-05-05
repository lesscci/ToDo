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

                    @if (Session::has('alert-success'))

                    <div class="alert alert-success" role="alert">
                    {{(Session::get('alert-success'))}}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descripcion</th>
                                <th>Completada</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
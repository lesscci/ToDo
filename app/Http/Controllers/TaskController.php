<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use App\Models\State;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::All();
        return view('tasks.index', [
            'tasks' => $task
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::pluck('states', 'id')->toArray();
        return view('tasks.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TasksRequest $request)
    {
        $validatedData = $request->validated();

        Task::create([
            'titulo' => $validatedData['titulo'],
            'descripcion' => $validatedData['descripcion'],
            'states_id' => 1,
            'user_id' => auth()->user()->id,
        ]);

        $request->session()->flash('alert-success', 'Tarea realizada correctamente');
        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            request()->session()->flash('error', 'Tarea no encontrada');
            return to_route('tasks.index')->withErrors([
                'error' => 'No encontrado'
            ]);
        }
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        if (!$task) {
            request()->session()->flash('error', 'Tarea no encontrada');
            return to_route('tasks.index')->withErrors([
                'error' => 'No encontrado'
            ]);
        }
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TasksRequest $request)
    {

        $task = Task::find($request->task_id);
        if (!$task) {
            request()->session()->flash('error', 'Tarea no encontrada');
            return to_route('tasks.index')->withErrors([
                'error' => 'No encontrado'
            ]);
        }

        $task->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'states' => $request->states
        ]);


        $request->session()->flash('alert-info', 'Tarea actualizada correctamente');
        return to_route('tasks.index');
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}

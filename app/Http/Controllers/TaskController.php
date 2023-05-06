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
        return view('tasks.index', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = \App\Models\State::pluck('name', 'id')->toArray();
        return view('tasks.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required|min:5|max:500',
            'state_id' => 'required|numeric',
        ]);

        $tarea = new Task();
        $tarea->tarea = $validatedData['titulo'];
        $tarea->user_id =auth()->user()->id;
        $tarea->state_id = $validatedData['state_id'];
        $tarea->save();

        return redirect()->route('task.index');*/
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task, $id)
    {
        $tareas = Task::findOrFail($id);
        return view('tasks.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, $id)
    {
        $tareas = Task::findOrFail($id);
        return view('tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
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

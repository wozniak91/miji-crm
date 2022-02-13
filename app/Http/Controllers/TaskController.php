<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::latest()->paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'point' => 'required|numeric',
            'active' => 'boolean',
            'start_date' => 'required|date|after:tomorrow',
            'finish_date' => 'required|date|after:start_date',
        ]);

        return Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'point' => $request->point,
            'active' => $request->active,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Task::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'point' => 'numeric',
            'active' => 'boolean',
            'start_date' => 'date|after:tomorrow',
            'finish_date' => 'date|after:start_date',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        return $task->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::latest()->paginate(50);
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
            'active' => 'boolean',
            'status' => 'required|numeric',
            'start_date' => 'required|date|after:today',
            'finish_date' => 'required|date|after:start_date',
        ]);

        return Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
            'status' => $request->status,
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
        return Project::findOrFail($id);
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
            'active' => 'boolean',
            'status' => 'numeric',
            'start_date' => 'date|after:today',
            'finish_date' => 'date|after:start_date',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        return $project->delete();
    }
}

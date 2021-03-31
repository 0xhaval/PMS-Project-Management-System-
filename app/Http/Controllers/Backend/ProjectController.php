<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.projects.index',[
            'projects' => Project::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.projects.create', [
            'projectTypes' => ProjectType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'supervisor' => 'required|string',
            'dept' => 'required|in:computers,networking,softwares',
            'project_type_id' => 'required',
            'project_number' => 'required|unique:projects'
        ]);
        Project::create($data);
        return $this->redirectRoutes('admin.project.index', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('backend.projects.update', [
            'project' => $project,
            'projectTypes' => ProjectType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'supervisor' => 'required|string',
            'dept' => 'required|in:computers,networking,softwares',
            'project_type_id' => 'required',
            'project_number' => ['required', Rule::unique('projects')->ignore($request->id)]
        ]);

        $project->update($data);
        return $this->redirectRoutes('admin.project.index', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return $this->redirectRoutes('admin.project.index', 'Project deleted successfully');
    }
}

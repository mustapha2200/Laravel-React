<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use Inertia\Inertia;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = Project::query();

        $projects = $query->paginate(10);

        return inertia("Project/Index",[
            'projects' => ProjectResource::collection($projects),
            'success' => session('success')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return inertia('Project/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        $Data = $request->validated();
        $Data['create_by'] = FacadesAuth::id();
        $Data['updated_by'] = FacadesAuth::id();
        $projects = Project::create($Data);

        return to_route('project.index', $projects)->with('success','Project was created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return inertia('Project/Edit', [
            'project' =>  $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {       $data = $request->validated();
            $data['updated_by'] = FacadesAuth::id();
            $project->update($data);
            return to_route('project.index',$project)->with('success',"Project\"$project->name\"updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //

        $project->delete();
        return to_route('project.index')->with('success',"Project\"$project->name\"delted");

    }
}

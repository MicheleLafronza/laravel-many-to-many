<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Functions\Helper;
use App\Models\Admin\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::orderBy('id', 'desc')->get();
        // dd($projects);
        $types = Type::all();

        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {

        
        $project = $request->all();

        $new_project = new Project();
        $new_project->fill($project);
        $new_project->slug = Helper::generateSlug($new_project->title, Project::class);
        $new_project->save();


        return redirect()->route('admin.project.show', $new_project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::all();
        $data = ['HTML', 'CSS', 'Javascript', 'Php'];

        return view('admin.projects.edit', compact('project', 'types', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $data = $request->all();
        $project = Project::find($id);

        if($data['title'] === $project->title){
            $data['slug'] = $project->slug;
        } else {
            $data['slug'] = Helper::generateSlug($data['title'], Project::class);
        }

        $project->update($data);

        return redirect()->route('admin.project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index')->with('deleted', 'Il progetto ' . $project->title . ' è stato eliminato');
    }
}

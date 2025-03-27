<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projectList = Project::orderBy('creation_date', 'desc')->get();

        $data = [
            "project" => $projectList
        ];

        return view("project.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $data = [
            'project' => $project
        ];

        return view("project.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validate([

            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'creation_date' => 'required|date',
            'cover_image' => 'required',
        ]);

        if ($request->has('cover_image')) {

            $image_path = Storage::put('uploads', $request->cover_image);
            $data['cover_image'] = $image_path;
            # code...
        }

        Project::create($data);

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('project.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = [
            'project' => $project
        ];

        return view("project.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = [
            'project' => $project
        ];

        return view("project.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validate([

            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'creation_date' => 'required|date',
            'cover_image' => 'required',
        ]);

        if ($request->has('cover_image')) {

            $image_path = Storage::put('uploads', $request->cover_image);
            $data['cover_image'] = $image_path;
            # code...

            if ($project->cover_image && !Str::start($project->cover_image, 'http')) {

                Storage::delete($project->cover_image);
                # code...
            }
        }

        /* if ($request->has('cover_image')) {

            $image_path = Storage::put('uploads', $request->cover_image);
            $data['cover_image'] = $image_path;
            # code...
        }

        // Controllo se è stato caricato un nuovo file immagine
        if ($request->hasFile('cover_image')) {

            //  Salvo il file nella cartella "storage/app/public/uploads"
            // Il secondo parametro 'public' dice di usare il disco 'public' definito in config/filesystems.php
            $image_path = $request->file('cover_image')->store('uploads', 'public');

            //  Salvo il path nel database in modo che sia accessibile da /storage/...
            // Laravel crea un link simbolico con `php artisan storage:link`
            $data['cover_image'] = '/storage/' . $image_path;
        }
 */
        $project->update($data);

        return redirect()->route('project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('project.index');
    }
}

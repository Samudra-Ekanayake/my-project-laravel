<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {

        /* shortcut per richiamare tutti i progetti -> return Project::all(); */

        return response()->json([
            'success' => true,
            'projects' => Project::orderBy('id')->paginate(),
        ]);
    }

    public function show($id)
    {

        $project = Project::where('id', $id)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);
        } else {

            return response()->json([
                'success' => false,
                'message' => 'Project not found',
            ], 404);
        }
    }

    public function latest() 
    {

        $projectIds = [45, 40, 39];

        return response()->json([
            'success' => true,
            'projects' => Project::whereIn('id', $projectIds)->get()
        ]);
    }
}

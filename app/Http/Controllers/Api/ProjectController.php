<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index () {

        /* shortcut per richiamare tutti i progetti -> return Project::all(); */
 
         return response()->json([
            'success' => true,
            'project' => Project::orderBy('id')->paginate(),
        ]);  

        
    }
}

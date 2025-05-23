<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::get('project', function() {
    return Project::all();
}); */

Route::get('project', [ProjectController::class, 'index']);
Route::get('project/latest', [ProjectController::class, 'latest']);
Route::get('project/{project}', [ProjectController::class, 'show']);


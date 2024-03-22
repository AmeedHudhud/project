<?php

use App\Http\Controllers\ProjectAPI;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Visits;
use App\Models\visit;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('projects',ProjectAPI::class);

Route::get('/projects',[Projects::class,'allProjects']);
Route::get('/project/status',[Projects::class,'projectStatus']);
Route::get('/project/number',[Projects::class,'projectNumber']);
Route::post('/project',[Projects::class,'store']);
// Route::delete('/deleteproject',[Projects::class,'deleteProject']);
Route::delete('/deleteproject/{project_number}',[Projects::class,'deleteProject']);
Route::put('/updateproject/{project_id}',[Projects::class,'update']);


Route::post('/createvisit',[Visits::class,'store']);
Route::get('/visits',[Visits::class,'allvisits']);
// Route::get('/visitnumber/{visit_number}',[Visits::class,'getVisitByNumber']);
Route::get('/visitnumber',[Visits::class,'getVisitByNumber']);
Route::get('/visitproject',[Visits::class,'getVisitByProject']);
Route::get('/test',[Visits::class,'test']);
Route::delete('/deletevisit/{visit_number}',[Visits::class,'deletevisit']);
Route::delete('/test1',[Visits::class,'test1']);
Route::put('/updatevisit/{visit_number}',[Visits::class,'update']);








<?php

use App\Http\Controllers\ProjectAPI;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Users;
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
// Route::delete('/deleteproject',[Projects::class,'deleteProject']);
// Route::get('/visitnumber/{visit_number}',[Visits::class,'getVisitByNumber']);


Route::get('/projects',[Projects::class,'getAllProjects']);
Route::get('/project/status',[Projects::class,'getProjectsByStatus']);
Route::get('/project/number',[Projects::class,'getProjectsByNumber']);
Route::post('/project/create',[Projects::class,'store']);
Route::delete('/project/delete/{project_number}',[Projects::class,'deleteProject']);
Route::put('/project/update/{project_id}',[Projects::class,'update']);


Route::post('/visit/create',[Visits::class,'store']);
Route::get('/visits',[Visits::class,'getAllVisits']);
Route::get('/visit/number',[Visits::class,'getVisitByNumber']);
Route::get('/visit/project',[Visits::class,'getVisitByProject']);
Route::delete('/visit/delete/{visit_number}',[Visits::class,'deletevisit']);
Route::put('/visit/update/{visit_number}',[Visits::class,'update']);
Route::get('/visit',[Visits::class,'getVisitByVisitAndProjectNumber']);
Route::delete('/visit/delete',[Visits::class,'deleteVisitByVisitAndProjectNumber']);


Route::post('/user/create',[Users::class,'createUser']);
Route::post('/login',[Users::class,'login']);
Route::put('/user/update/{email}',[Users::class,'update']);

<?php

use App\Http\Controllers\Contractors;
use App\Http\Controllers\Engineers;
use App\Http\Controllers\Fines;
use App\Http\Controllers\Laboratories;
use App\Http\Controllers\ProjectAPI;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Specialties;
use App\Http\Controllers\supervisingContractingOffices;
use App\Http\Controllers\Users;
use App\Http\Controllers\Violations;
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
Route::delete('/user/delete/{email}',[Users::class,'delete']);
Route::put('/user/update/{email}',[Users::class,'update']);

Route::get('/engineer',[Engineers::class,'index']);
Route::post('/engineer/create',[Engineers::class,'create']);
Route::put('/engineer/update/{engineer_number}',[Engineers::class,'update']);
Route::delete('/engineer/delete/{engineer_number}',[Engineers::class,'delete']);

Route::post('/contractor/create',[Contractors::class,'create']);
Route::get('/contractor',[Contractors::class,'index']);
Route::put('/contractor/update/{id}',[Contractors::class,'update']);
Route::delete('/contractor/delete/{id}',[Contractors::class,'delete']);

Route::post('/specialties/create',[Specialties::class,'create']);

Route::post('/office/create',[supervisingContractingOffices::class,'create']);
Route::get('/office',[supervisingContractingOffices::class,'index']);
Route::put('/office/update/{office_classification}',[supervisingContractingOffices::class,'update']);
Route::delete('/office/delete/{office_classification}',[supervisingContractingOffices::class,'delete']);

Route::post('/lab/create',[Laboratories::class,'create']);


Route::post('/fines/create',[Fines::class,'create']);
Route::get('/fines/{officeClassification}',[Fines::class,'index']);
Route::put('/fines/update/{officeClassification}',[Fines::class,'update']);
Route::delete('/fines/delete/{officeClassification}',[Fines::class,'delete']);


Route::post('/violation/create',[Violations::class,'create']);
Route::get('/violation/{officeClassification}',[Violations::class,'index']);
Route::delete('/violations/{officeClassification}/{violationNumber}/{project_number}', [Violations::class, 'delete']);

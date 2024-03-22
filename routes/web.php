<?php

use App\Models\contractor;
use App\Models\engineer;
use App\Models\laboratorie;
use App\Models\Project;
use App\Models\specialtie;
use App\Models\User;
use App\Models\visit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // return view('welcome');
    // $user = User::where('email', 'user1@example.com')->first();
    // return $user->email;
    // $project = Project::where('project_number', 'A1')->first();
    // return $project;

    // $user = User::find('user1@example.com');
    // $project=$user->projects();
    // return $project;

    // $project = Project::with('users')->find(15813);
    // $project = Project::with('users')->where('project_number', '15813');

    // $project = Project::where('project_number', '15813');
    // return $project;

    // $project = Project::with('users')->where('project_number', '15813')->first();
    // $users = $project;
    // return $project->users->pluck('email');

    // $enginner = engineer::where('engineer_number',10)->first();
    // return $enginner;

    // $spec = specialtie::with('engineers')->where('specialization_name', 'كهربا')->first();
    // return $spec;


    // $project =Project::where('project_number','22247')->first();
    // $project =laboratorie::with('projects')->where('Laboratory_name','lab3')->first();
    // return $project;

    // $enginner =engineer::where('engineer_number',1)->first();


    // $project =project::with('contractor_enginner')->where('contractor_engineer_number',1)->get();
    // return $project;


    // $project=Project::with('contractor')->where('project_number','7907')->first();
    // return $project->contractor->Contractor_name;

    // $project=Project::with('contractor_enginner')->where('project_status','Under Execution')->get();
    // return $project->pluck('contractor_enginner.engineer_name');
    // $project1=Project::with('contractor')->where('project_status',$project_status)->get();

    // $project_number = $request->query('project_number', null);
    // return Project::where('project_number', '12652')->get();



// if ($project) {
//     // Assuming 'contractor_engineer' relationship is defined properly
//     $contractorName = $project->contractor_engineer->contractor_name; // Assuming 'name' is the attribute representing contractor's name

//     return $contractorName;
// } else {
//     return "Project not found";
// }


    // $visit=visit::where('visit_number',1)->get();
    // $project=visit::with('visit')->where('visit_number',1)->first();
    // $project = Project::with('contractor_enginner')->where('project_number', 1000)->first();
    // $project=visit::with('project')->where('visit_number',1)->first();
    // $visit=Project::with('visit')->where('project_number','1000')->get();

    // $visits = visit::with('project')->where('visit_number', '1000')->get();
    // $visits = Project::where('project_number', '1000')->first()->visit;
    // $project = Project::with('visit')->where('project_number', '1000')->get();
    // $visits = Project::where('project_number', '1000')->first()->visit;
    // $visit = Visit::where('visit_number', 2)->first();
    // return $visit;

    $cor=visit::with('correspondence')->where('visit_number',1 )->first();
    return $cor;


});

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class Projects extends Controller
{
    // public function allProjects()
    // {
    //     return Project::all();
    //     // return Project::paginate();
    // }
    public function getAllProjects()
    {
        $projects = Project::with('contractor_enginner', 'contractor')->get();

        $transformedProjects = $projects->map(function ($project) {
            return [
                'project_number' => $project->project_number,
                'governorate' => $project->governorate,
                'designing_engineering_office' => $project->designing_engineering_office,
                'project_name' => $project->project_name,
                'widget' => $project->widget,
                'the_basin' => $project->the_basin,
                'region' => $project->region,
                'spacae' => $project->spacae,
                'project_status' => $project->project_status,
                'Laboratory_name' => $project->Laboratory_name,
                'engineer_name' => $project->contractor_enginner->engineer_name,
                'contractor_name' => $project->contractor->Contractor_name
            ];
        });

        return response()->json(['projects' => $transformedProjects], 200);
    }
    //getProjectsByStatus
    public function getProjectsByStatus(Request $request)
    {
        $project_status = $request->query('project_status', null);
        return Project::where('project_status', $project_status)->get();

        // $limit=$request->query('limit',10);
        // return Project::where('project_status', $project_status)->paginate($limit);

        //number
        // $project_status = $request->query('project_status', null);
        // $count = Project::where('project_status', $project_status)->count();
        // return response()->json(['count' => $count], 200);
    }
    public function getProjectsByNumber(Request $request)
    {
        $project_number = $request->query('project_number', null);
        $project = Project::with('contractor_enginner')->where('project_number', $project_number)->first();
        $project1 = Project::with('contractor')->where('project_number', $project_number)->first();
        if ($project) {
            $data = [
                'project_number' => $project->project_number,
                'governorate' => $project->governorate,
                'designing_engineering_office' => $project->designing_engineering_office,
                'project_name' => $project->project_name,
                'widget' => $project->widget,
                'the_basin' => $project->the_basin,
                'region' => $project->region,
                'spacae' => $project->spacae,
                'project_status' => $project->project_status,
                'Laboratory_name' => $project->Laboratory_name,
                'engineer_name' => $project->contractor_enginner->engineer_name,
                'contractor_name' => $project1->contractor->Contractor_name
            ];
            return response()->json(['project' => $data], 200);
        } else {
            return response()->json(['message' => 'Project not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'project_number' => 'required|string|unique:projects,project_number',
            'governorate' => 'required|string',
            'designing_engineering_office' => 'required|string',
            'project_name' => 'required|string',
            'widget' => 'required|integer',
            'the_basin' => 'required|integer',
            'region' => 'required|string',
            'spacae' => 'required|integer',
            'project_status' => 'required|in:Suspended,Under Execution,Under Execution/Completed Construction',
            'Laboratory_name' => 'required|exists:laboratories,Laboratory_name',
            'contractor_engineer_number' => 'required|exists:engineers,engineer_number',
            'contractor_id' => 'required|exists:contractors,id'
        ]);

        $project = Project::create($request->all());
        if ($project) {
            return response()->json(['message' => 'Project created successfully'], 201);
        } else {
            return response()->json(['error' => 'Failed to create project'], 500);
        }
    }
    public function deleteProject($project_number)
    {
        $project = Project::where('project_number', $project_number)->first();
        if ($project) {
            $project->delete();
            return response()->json(['message' => 'Project deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Project not found'], 404);
        }
    }
    public function update(Request $request, string $project_id)
    {
        $project = Project::where('project_number', $project_id)->first();
        if ($project) {
            // return $project;
            $request->validate([
                'project_number' => 'sometimes|string|unique:projects,project_number',
                'governorate' => 'sometimes|required|string',
                'designing_engineering_office' => 'sometimes|required|string',
                'project_name' => 'sometimes|required|string',
                'widget' => 'sometimes|required|integer',
                'the_basin' => 'sometimes|required|integer',
                'region' => 'sometimes|required|string',
                'spacae' => 'sometimes|required|integer',
                'project_status' => 'sometimes|required|in:Suspended,Under Execution,Under Execution/Completed Construction',
                'Laboratory_name' => 'sometimes|required|exists:laboratories,Laboratory_name',
                'contractor_engineer_number' => 'sometimes|required|exists:engineers,engineer_number',
                'contractor_id' => 'sometimes|required|exists:contractors,id'
            ]);
            $project->update($request->all());
            return $project;
        } else {
            return response()->json(['message' => 'Project not found'], 404);
        }
    }

    // public function deleteProject(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         'project_number' => 'required|string',
//     ]);

    //     $project = Project::where('project_number', $request->input('project_number'))->first();

    //     if ($project) {
//         $project->delete();
//         return response()->json(['message' => 'Project deleted successfully'], 200);
//     } else {
//         return response()->json(['message' => 'Project not found'], 404);
//     }
// }

    //56
}

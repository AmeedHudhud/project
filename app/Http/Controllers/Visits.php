<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\visit;
use Illuminate\Http\Request;

class Visits extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'visit_number' => 'required|integer|unique:visits,visit_number',
            'project_number' => 'required|string|exists:projects,project_number',
            'visiting_day' => 'required|string',
            'first_name' => 'required|string',
            'second_name' => 'required|string',
            'third_name' => 'nullable|string',
            'fourth_name' => 'nullable|string',
            'municipality_surveys' => 'nullable|string',
            'inspection_committee_reviews' => 'nullable|string',
            'labor_ministry_reports' => 'nullable|string',
            'final_visit_notes' => 'nullable|string',
            'supervision_engineer_timesheet' => 'required|in:exist,not exist',
            'staff_general_comments' => 'nullable|string',
            'project_state' => 'nullable|string',
            'special_supervision_office' => 'required|in:exist,not exist',
            'special_supervision_office_notes' => 'nullable|string',
            'site_information_board' => 'required|in:exist,not exist',
            'site_information_board_notes' => 'nullable|string',
            'wc' => 'required|in:exist,not exist',
            'bathroom_notes' => 'nullable|string',
            'water_tank' => 'required|in:exist,not exist',
            'water_tank_notes' => 'nullable|string',
            'protection_fence' => 'required|in:exist,not exist',
            'protection_fence_notes' => 'nullable|string',
            'first_aid_cabinet' => 'required|in:exist,not exist',
            'first_aid_cabinet_notes' => 'nullable|string',
            'supervising_engineer_computer' => 'required|in:exist,not exist',
            'supervising_engineer_computer_notes' => 'nullable|string',
            'telephone' => 'required|in:exist,not exist',
            'telephone_notes' => 'nullable|string',
            'cell_phone' => 'required|in:exist,not exist',
            'cell_phone_notes' => 'nullable|string',
            'site_preparations_notes' => 'nullable|string',
            'architectural_plans' => 'required|in:exist,not exist',
            'architectural_plans_notes' => 'nullable|string',
            'construction_plans' => 'required|in:exist,not exist',
            'construction_plans_notes' => 'nullable|string',
            'electrical_diagrams' => 'required|in:exist,not exist',
            'electrical_diagrams_notes' => 'nullable|string',
            'mechanical_diagrams' => 'required|in:exist,not exist',
            'mechanical_diagrams_notes' => 'nullable|string',
            'daily_reports' => 'required|in:exist,not exist',
            'daily_reports_notes' => 'nullable|string',
            'meeting_minutes' => 'required|in:exist,not exist',
            'meeting_minutes_notes' => 'nullable|string',
            'correspondence_material_checks' => 'required|in:exist,not exist',
            'correspondence_material_checks_notes' => 'nullable|string',
            'business_audit_requests' => 'required|in:exist,not exist',
            'business_audit_requests_notes' => 'nullable|string',
            'correspondencee' => 'required|in:exist,not exist',
            'correspondencee_notes' => 'nullable|string',
            'plans_reports_notes' => 'nullable|string',
            'supervisory_staff_room_preparation' => 'required|in:exist,not exist',
            'engineer_desk_chair_preparation' => 'required|in:exist,not exist',
            'computer_provision' => 'required|in:exist,not exist',
            'filing_cabinet_provision' => 'required|in:exist,not exist',
            'printer_availability' => 'required|in:exist,not exist',
            'sealed_licensed_plans_copy' => 'required|in:exist,not exist',
            'license_copy' => 'required|in:exist,not exist',
            'project_insurance_copy' => 'required|in:exist,not exist',
            'engineering_examinations_copy' => 'required|in:exist,not exist',
            'casting_permissions_copy' => 'required|in:exist,not exist',
            'status' => 'nullable|string',
            'correspondence_id' => 'nullable|integer|exists:correspondences,id'
        ]);

        $visit = visit::create($request->all());
        // $newlyCreatedVisit = Visit::where($visit->visiting_date);/''
        if ($visit) {
            return response()->json(['message' => 'visit created']);
        } else {
            return response()->json(['message' => 'error'], 500);
        }
    }
    protected function getAllVisits()
    {
        $visit = visit::all();
        return $visit;
    }
    // protected function getVisitByNumber(Request $request, $visit_number){
    //     $project=visit::with('project')->where('visit_number',1)->first();
    //     $visit =visit::where('visit_number',$visit_number)->first();
    //     $x=$project->project->project_name;

    //     if($visit)
    //     {
    //         $data = [
    //             'visit_number' => $visit->visit_number,
    //             'project_number' => $x,
    //             'visiting_day' => $visit->visiting_day,
    //             'visiting_date' => $visit->visiting_date,
    //             'first_name' => $visit->first_name,
    //             'second_name' => $visit->second_name,
    //             'third_name' => $visit->third_name,
    //             'fourth_name' => $visit->fourth_name,
    //             'municipality_surveys' => $visit->municipality_surveys,
    //             'inspection_committee_reviews' => $visit->inspection_committee_reviews,
    //             'labor_ministry_reports' => $visit->labor_ministry_reports,
    //             'final_visit_notes' => $visit->final_visit_notes,
    //             'supervision_engineer_timesheet' => $visit->supervision_engineer_timesheet,
    //             'staff_general_comments' => $visit->staff_general_comments,
    //             'project_state' => $visit->project_state,
    //             'special_supervision_office' => $visit->special_supervision_office,
    //             'special_supervision_office_notes' => $visit->special_supervision_office_notes,
    //             'site_information_board' => $visit->site_information_board,
    //             'site_information_board_notes' => $visit->site_information_board_notes,
    //             'wc' => $visit->wc,
    //             'bathroom_notes' => $visit->bathroom_notes,
    //             'water_tank' => $visit->water_tank,
    //             'water_tank_notes' => $visit->water_tank_notes,
    //             'protection_fence' => $visit->protection_fence,
    //             'protection_fence_notes' => $visit->protection_fence_notes,
    //             'first_aid_cabinet' => $visit->first_aid_cabinet,
    //             'first_aid_cabinet_notes' => $visit->first_aid_cabinet_notes,
    //             'supervising_engineer_computer' => $visit->supervising_engineer_computer,
    //             'supervising_engineer_computer_notes' => $visit->supervising_engineer_computer_notes,
    //             'telephone' => $visit->telephone,
    //             'telephone_notes' => $visit->telephone_notes,
    //             'cell_phone' => $visit->cell_phone,
    //             'cell_phone_notes' => $visit->cell_phone_notes,
    //             'site_preparations_notes' => $visit->site_preparations_notes,
    //             'architectural_plans' => $visit->architectural_plans,
    //             'architectural_plans_notes' => $visit->architectural_plans_notes,
    //             'construction_plans' => $visit->construction_plans,
    //             'construction_plans_notes' => $visit->construction_plans_notes,
    //             'electrical_diagrams' => $visit->electrical_diagrams,
    //             'electrical_diagrams_notes' => $visit->electrical_diagrams_notes,
    //             'mechanical_diagrams' => $visit->mechanical_diagrams,
    //             'mechanical_diagrams_notes' => $visit->mechanical_diagrams_notes,
    //             'daily_reports' => $visit->daily_reports,
    //             'daily_reports_notes' => $visit->daily_reports_notes,
    //             'meeting_minutes' => $visit->meeting_minutes,
    //             'meeting_minutes_notes' => $visit->meeting_minutes_notes,
    //             'correspondence_material_checks' => $visit->correspondence_material_checks,
    //             'correspondence_material_checks_notes' => $visit->correspondence_material_checks_notes,
    //             'business_audit_requests' => $visit->business_audit_requests,
    //             'business_audit_requests_notes' => $visit->business_audit_requests_notes,
    //             'correspondence' => $visit->correspondence,
    //             'correspondence_notes' => $visit->correspondence_notes,
    //             'plans_reports_notes' => $visit->plans_reports_notes,
    //             'supervisory_staff_room_preparation' => $visit->supervisory_staff_room_preparation,
    //             'engineer_desk_chair_preparation' => $visit->engineer_desk_chair_preparation,
    //             'computer_provision' => $visit->computer_provision,
    //             'filing_cabinet_provision' => $visit->filing_cabinet_provision,
    //             'printer_availability' => $visit->printer_availability,
    //             'sealed_licensed_plans_copy' => $visit->sealed_licensed_plans_copy,
    //             'license_copy' => $visit->license_copy,
    //             'project_insurance_copy' => $visit->project_insurance_copy,
    //             'engineering_examinations_copy' => $visit->engineering_examinations_copy,
    //             'casting_permissions_copy' => $visit->casting_permissions_copy,
    //             'status' => $visit->status
    //             // 'correspondence_id' => $visit->
    //         ];
    //         return response()->json(['visit' => $data], 200);
    //     } else {
    //         return response()->json(['message' => 'visit not found'], 404);
    //     }
    // }
    protected function getVisitByNumber(Request $request)
    {
        $visit_number = $request->query('visit_number', null);
    $visit = Visit::with('project')->where('visit_number', $visit_number)->first();
    $correspondence = Visit::with('correspondence')->where('visit_number', $visit_number)->first();

    if ($visit) {
        $data = [
            'visit_number' => $visit->visit_number,
            'project_name' => $visit->project->project_name,
            'visiting_day' => $visit->visiting_day,
            'visiting_date' => $visit->visiting_date,
            'first_name' => $visit->first_name,
            'second_name' => $visit->second_name,
            'third_name' => $visit->third_name,
            'fourth_name' => $visit->fourth_name,
            'municipality_surveys' => $visit->municipality_surveys,
            'inspection_committee_reviews' => $visit->inspection_committee_reviews,
            'labor_ministry_reports' => $visit->labor_ministry_reports,
            'final_visit_notes' => $visit->final_visit_notes,
            'supervision_engineer_timesheet' => $visit->supervision_engineer_timesheet,
            'staff_general_comments' => $visit->staff_general_comments,
            'project_state' => $visit->project_state,
            'special_supervision_office' => $visit->special_supervision_office,
            'special_supervision_office_notes' => $visit->special_supervision_office_notes,
            'site_information_board' => $visit->site_information_board,
            'site_information_board_notes' => $visit->site_information_board_notes,
            'wc' => $visit->wc,
            'bathroom_notes' => $visit->bathroom_notes,
            'water_tank' => $visit->water_tank,
            'water_tank_notes' => $visit->water_tank_notes,
            'protection_fence' => $visit->protection_fence,
            'protection_fence_notes' => $visit->protection_fence_notes,
            'first_aid_cabinet' => $visit->first_aid_cabinet,
            'first_aid_cabinet_notes' => $visit->first_aid_cabinet_notes,
            'supervising_engineer_computer' => $visit->supervising_engineer_computer,
            'supervising_engineer_computer_notes' => $visit->supervising_engineer_computer_notes,
            'telephone' => $visit->telephone,
            'telephone_notes' => $visit->telephone_notes,
            'cell_phone' => $visit->cell_phone,
            'cell_phone_notes' => $visit->cell_phone_notes,
            'site_preparations_notes' => $visit->site_preparations_notes,
            'architectural_plans' => $visit->architectural_plans,
            'architectural_plans_notes' => $visit->architectural_plans_notes,
            'construction_plans' => $visit->construction_plans,
            'construction_plans_notes' => $visit->construction_plans_notes,
            'electrical_diagrams' => $visit->electrical_diagrams,
            'electrical_diagrams_notes' => $visit->electrical_diagrams_notes,
            'mechanical_diagrams' => $visit->mechanical_diagrams,
            'mechanical_diagrams_notes' => $visit->mechanical_diagrams_notes,
            'daily_reports' => $visit->daily_reports,
            'daily_reports_notes' => $visit->daily_reports_notes,
            'meeting_minutes' => $visit->meeting_minutes,
            'meeting_minutes_notes' => $visit->meeting_minutes_notes,
            'correspondence_material_checks' => $visit->correspondence_material_checks,
            'correspondence_material_checks_notes' => $visit->correspondence_material_checks_notes,
            'business_audit_requests' => $visit->business_audit_requests,
            'business_audit_requests_notes' => $visit->business_audit_requests_notes,
            'correspondencee' => $visit->correspondencee,
            'correspondencee_notes' => $visit->correspondencee_notes,
            'plans_reports_notes' => $visit->plans_reports_notes,
            'supervisory_staff_room_preparation' => $visit->supervisory_staff_room_preparation,
            'engineer_desk_chair_preparation' => $visit->engineer_desk_chair_preparation,
            'computer_provision' => $visit->computer_provision,
            'filing_cabinet_provision' => $visit->filing_cabinet_provision,
            'printer_availability' => $visit->printer_availability,
            'sealed_licensed_plans_copy' => $visit->sealed_licensed_plans_copy,
            'license_copy' => $visit->license_copy,
            'project_insurance_copy' => $visit->project_insurance_copy,
            'engineering_examinations_copy' => $visit->engineering_examinations_copy,
            'casting_permissions_copy' => $visit->casting_permissions_copy,
            'status' => $visit->status,
            'correspondence_message' => $correspondence ? optional($correspondence->correspondence)->message : null,
        ];

        return response()->json(['visit' => $data], 200);
    } else {
        return response()->json(['message' => 'Visit not found'], 404);
    }
    }
    protected function getVisitByProject(Request $request)
    {
        $project_number = $request->query('project_number', null);
        $project = Project::where('project_number', $project_number)->first();

        if ($project) {
            $visits = $project->visit;

            if ($visits->isNotEmpty()) {
                return response()->json(['visits' => $visits], 200);
            } else {
                return response()->json(['message' => "No visits found for the project"], 404);
            }
        } else {
            return response()->json(['message' => "Project not found"], 404);
        }
    }
    protected function getVisitByVisitAndProjectNumber (Request $request)
    {
        $project_number = $request->query('project_number', null);
        $visit_number = $request->query('visit_number', null);

        $visit = Visit::with('project')
            ->whereHas('project', function ($query) use ($project_number) {
                $query->where('project_number', $project_number);
            })
            ->where('visit_number', $visit_number)
            ->first();

        if ($visit) {
            return response()->json(['visit' => $visit], 200);
        } else {
            return response()->json(['message' => 'Visit not found for the given project number'], 404);
        }

    }
    public function deletevisit($visit_number)
    {
        $visit = Visit::where('visit_number', $visit_number)->first();

        if ($visit) {
            $visit->delete();
            return response()->json(['message' => 'Visit deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Visit not found'], 404);
        }
    }

    protected function deleteVisitByVisitAndProjectNumber(Request $request)
    {
        $project_number = $request->query('project_number', null);
        $visit_number = $request->query('visit_number', null);

        $visit = Visit::with('project')
            ->whereHas('project', function ($query) use ($project_number) {
                $query->where('project_number', $project_number);
            })
            ->where('visit_number', $visit_number)
            ->first();

        if ($visit) {
            $visit->delete();
            return response()->json(['message' => 'Visit deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Visit not found'], 404);
        }
    }
    protected function update(Request $request,string $visit_number){
        $visit=visit::where('visit_number',$visit_number)->first();
        // return $visit;

        if($visit)
        {
            $request->validate([
                'visit_number' => 'sometimes|integer|unique:visits,visit_number',
                'project_number' => 'sometimes|string|exists:projects,project_number',
                'visiting_day' => 'sometimes|string',
                'first_name' => 'sometimes|required|string',
                'second_name' => 'sometimes|required|string',
                'third_name' => 'sometimes|nullable|string',
                'fourth_name' => 'sometimes|nullable|string',
                'municipality_surveys' => 'sometimes|nullable|string',
                'inspection_committee_reviews' => 'sometimes|nullable|string',
                'labor_ministry_reports' => 'sometimes|nullable|string',
                'final_visit_notes' => 'sometimes|nullable|string',
                'supervision_engineer_timesheet' => 'sometimes|required|in:exist,not exist',
                'staff_general_comments' => 'sometimes|nullable|string',
                'project_state' => 'sometimes|nullable|string',
                'special_supervision_office' => 'sometimes|required|in:exist,not exist',
                'special_supervision_office_notes' => 'sometimes|nullable|string',
                'site_information_board' => 'sometimes|required|in:exist,not exist',
                'site_information_board_notes' => 'sometimes|nullable|string',
                'wc' => 'sometimes|required|in:exist,not exist',
                'bathroom_notes' => 'sometimes|nullable|string',
                'water_tank' => 'sometimes|required|in:exist,not exist',
                'water_tank_notes' => 'sometimes|nullable|string',
                'protection_fence' => 'sometimes|required|in:exist,not exist',
                'protection_fence_notes' => 'sometimes|nullable|string',
                'first_aid_cabinet' => 'sometimes|required|in:exist,not exist',
                'first_aid_cabinet_notes' => 'sometimes|nullable|string',
                'supervising_engineer_computer' => 'sometimes|required|in:exist,not exist',
                'supervising_engineer_computer_notes' => 'sometimes|nullable|string',
                'telephone' => 'sometimes|required|in:exist,not exist',
                'telephone_notes' => 'sometimes|nullable|string',
                'cell_phone' => 'sometimes|required|in:exist,not exist',
                'cell_phone_notes' => 'sometimes|nullable|string',
                'site_preparations_notes' => 'sometimes|nullable|string',
                'architectural_plans' => 'sometimes|required|in:exist,not exist',
                'architectural_plans_notes' => 'sometimes|nullable|string',
                'construction_plans' => 'sometimes|required|in:exist,not exist',
                'construction_plans_notes' => 'sometimes|nullable|string',
                'electrical_diagrams' => 'sometimes|required|in:exist,not exist',
                'electrical_diagrams_notes' => 'sometimes|nullable|string',
                'mechanical_diagrams' => 'sometimes|required|in:exist,not exist',
                'mechanical_diagrams_notes' => 'sometimes|nullable|string',
                'daily_reports' => 'sometimes|required|in:exist,not exist',
                'daily_reports_notes' => 'sometimes|nullable|string',
                'meeting_minutes' => 'sometimes|required|in:exist,not exist',
                'meeting_minutes_notes' => 'sometimes|nullable|string',
                'correspondence_material_checks' => 'sometimes|required|in:exist,not exist',
                'correspondence_material_checks_notes' => 'sometimes|nullable|string',
                'business_audit_requests' => 'sometimes|required|in:exist,not exist',
                'business_audit_requests_notes' => 'sometimes|nullable|string',
                'correspondencee' => 'sometimes|required|in:exist,not exist',
                'correspondencee_notes' => 'sometimes|nullable|string',
                'plans_reports_notes' => 'sometimes|nullable|string',
                'supervisory_staff_room_preparation' => 'sometimes|required|in:exist,not exist',
                'engineer_desk_chair_preparation' => 'sometimes|required|in:exist,not exist',
                'computer_provision' => 'sometimes|required|in:exist,not exist',
                'filing_cabinet_provision' => 'sometimes|required|in:exist,not exist',
                'printer_availability' => 'sometimes|required|in:exist,not exist',
                'sealed_licensed_plans_copy' => 'sometimes|required|in:exist,not exist',
                'license_copy' => 'sometimes|required|in:exist,not exist',
                'project_insurance_copy' => 'sometimes|required|in:exist,not exist',
                'engineering_examinations_copy' => 'sometimes|required|in:exist,not exist',
                'casting_permissions_copy' => 'sometimes|required|in:exist,not exist',
                'status' => 'sometimes|nullable|string',
                'correspondence_id' => 'sometimes|nullable|integer|exists:correspondences,id'
            ]);

            $visit->update($request->all());
            return $visit;
        }
        else
        {
            return response()->json(['message' => 'visit not found'], 404);
        }
    }




}

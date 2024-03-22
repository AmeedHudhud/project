<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            // $table->id();
            $table->integer('visit_number');
            $table->string('project_number');
            $table->string('visiting_day');
            $table->dateTime('visiting_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('third_name')->nullable();
            $table->string('fourth_name')->nullable();
            $table->text('municipality_surveys')->nullable();
            $table->text('inspection_committee_reviews')->nullable();
            $table->text('labor_ministry_reports')->nullable();
            $table->text('final_visit_notes')->nullable();
            $table->enum('supervision_engineer_timesheet', ['exist', 'not exist']);
            $table->text('staff_general_comments')->nullable();
            $table->text('project_state')->nullable();
            $table->enum('special_supervision_office', ['exist', 'not exist'])->default('exist');
            $table->text('special_supervision_office_notes')->nullable();
            $table->enum('site_information_board', ['exist', 'not exist']);
            $table->text('site_information_board_notes')->nullable();
            $table->enum('wc', ['exist', 'not exist']);
            $table->text('bathroom_notes')->nullable();
            $table->enum('water_tank', ['exist', 'not exist']);
            $table->text('water_tank_notes')->nullable();
            $table->enum('protection_fence', ['exist', 'not exist']);
            $table->text('protection_fence_notes')->nullable();
            $table->enum('first_aid_cabinet', ['exist', 'not exist']);
            $table->text('first_aid_cabinet_notes')->nullable();
            $table->enum('supervising_engineer_computer', ['exist', 'not exist']);
            $table->text('supervising_engineer_computer_notes')->nullable();
            $table->enum('telephone', ['exist', 'not exist']);
            $table->text('telephone_notes')->nullable();
            $table->enum('cell_phone', ['exist', 'not exist']);
            $table->text('cell_phone_notes')->nullable();
            $table->text('site_preparations_notes')->nullable();
            $table->enum('architectural_plans', ['exist', 'not exist']);
            $table->text('architectural_plans_notes')->nullable();
            $table->enum('construction_plans', ['exist', 'not exist']);
            $table->text('construction_plans_notes')->nullable();
            $table->enum('electrical_diagrams', ['exist', 'not exist']);
            $table->text('electrical_diagrams_notes')->nullable();
            $table->enum('mechanical_diagrams', ['exist', 'not exist']);
            $table->text('mechanical_diagrams_notes')->nullable();
            $table->enum('daily_reports', ['exist', 'not exist']);
            $table->text('daily_reports_notes')->nullable();
            $table->enum('meeting_minutes', ['exist', 'not exist']);
            $table->text('meeting_minutes_notes')->nullable();
            $table->enum('correspondence_material_checks', ['exist', 'not exist']);
            $table->text('correspondence_material_checks_notes')->nullable();
            $table->enum('business_audit_requests', ['exist', 'not exist']);
            $table->text('business_audit_requests_notes')->nullable();
            $table->enum('correspondencee', ['exist', 'not exist']);
            $table->text('correspondencee_notes')->nullable();
            $table->text('plans_reports_notes')->nullable();
            $table->enum('supervisory_staff_room_preparation', ['exist', 'not exist']);
            $table->enum('engineer_desk_chair_preparation', ['exist', 'not exist']);
            $table->enum('computer_provision', ['exist', 'not exist']);
            $table->enum('filing_cabinet_provision', ['exist', 'not exist']);
            $table->enum('printer_availability', ['exist', 'not exist']);
            $table->enum('sealed_licensed_plans_copy', ['exist', 'not exist']);
            $table->enum('license_copy', ['exist', 'not exist']);
            $table->enum('project_insurance_copy', ['exist', 'not exist']);
            $table->enum('engineering_examinations_copy', ['exist', 'not exist']);
            $table->enum('casting_permissions_copy', ['exist', 'not exist']);
            $table->string('status');
            $table->foreignId('correspondence_id')->nullable()->constrained();
            // $table->unique('visit_number');
            $table->primary('visiting_date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};

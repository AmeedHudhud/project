<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('engineers', function (Blueprint $table) {
            $table->foreign('specialization_name')->references('specialization_name')->on('specialties');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('Laboratory_name')->references('Laboratory_name')->on('laboratories');
            $table->foreign('contractor_engineer_number')->references('engineer_number')->on('engineers');
        });
        Schema::table('engineer_project', function (Blueprint $table) {
            $table->foreign('engineer_number')->references('engineer_number')->on('engineers');
            $table->foreign('project_number')->references('project_number')->on('projects');
        });
        Schema::table('project_photos', function (Blueprint $table) {
            $table->foreign('visiting_date')->references('visiting_date')->on('visits');
        });
        Schema::table('supervision_headquarters_photos', function (Blueprint $table) {
            $table->foreign('visiting_date')->references('visiting_date')->on('visits');
        });
        Schema::table('violations', function (Blueprint $table) {
            $table->foreign('project_number')->references('project_number')->on('projects');
            $table->foreign('office_classification')->references('office_classification')->on('supervising_contracting_offices');
        });
        Schema::table('contractor_presence', function (Blueprint $table) {
            $table->foreign('engineer_number')->references('engineer_number')->on('engineers');
            $table->foreign('project_number')->references('project_number')->on('projects');
            $table->foreign('visiting_date')->references('visiting_date')->on('visits');
        });
        Schema::table('residents_presence', function (Blueprint $table) {
            $table->foreign('engineer_number')->references('engineer_number')->on('engineers');
            $table->foreign('project_number')->references('project_number')->on('projects');
            $table->foreign('visiting_date')->references('visiting_date')->on('visits');
        });
        Schema::table('contracting_office_supervising_specializations', function (Blueprint $table) {
            $table->foreign('project_number', 'coss_project_number_fk')->references('project_number')->on('projects');
            $table->foreign('specialization_name', 'coss_specialization_name_fk')->references('specialization_name')->on('specialties');
            $table->foreign('office_classification', 'coss_office_classification_fk')->references('office_classification')->on('supervising_contracting_offices');
        });

        Schema::table('contracting_office_assistant_specializations', function (Blueprint $table) {
            $table->foreign('project_number', 'coas_project_number_fk')->references('project_number')->on('projects');
            $table->foreign('specialization_name', 'coas_specialization_name_fk')->references('specialization_name')->on('specialties');
            $table->foreign('office_classification', 'coas_office_classification_fk')->references('office_classification')->on('supervising_contracting_offices');
        });
        Schema::table('visits', function (Blueprint $table) {
            $table->foreign('project_number')->references('project_number')->on('projects');
            // $table->foreign('specialization_name', 'coas_specialization_name_fk')->references('specialization_name')->on('specialties');
            // $table->foreign('office_classification', 'coas_office_classification_fk')->references('office_classification')->on('supervising_contracting_offices');
        });




        /*
                    $table->string('project_number');
            $table->string('specialization_name');
            $table->unsignedInteger('office_classification');
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

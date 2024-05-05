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
        Schema::create('contracting_office_assistant_specializations', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->string('project_number');
            $table->string('specialization_name');
            $table->integer('office_classification');
            // $table->primary(['project_number', 'specialization_name']);
            $table->unique(['project_number', 'specialization_name'], 'custom_unique_constraint_name');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracting_office_assistant_specializations');
    }
};

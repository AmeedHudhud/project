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
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->integer('number_of_fines');
            $table->string('project_number');
            $table->integer('office_classification');

            // Define a shorter name for the unique constraint
            $table->unique(['number_of_fines', 'project_number', 'office_classification'], 'fines_unique');

            // Define foreign key constraints for both columns
            $table->foreign('project_number')->references('project_number')->on('projects');
            $table->foreign('office_classification')->references('office_classification')->on('supervising_contracting_offices');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};

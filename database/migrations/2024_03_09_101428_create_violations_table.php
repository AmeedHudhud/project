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
        Schema::create('violations', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('Violation_number'); // Assuming 'Violation number' is a string
            $table->enum('Response', ['Answered', 'Not answered'])->default('Not answered');
            $table->string('project_number');
            $table->integer('office_classification');

            $table->primary(['Violation_number', 'project_number','office_classification']);
            // $table->unique(['Violation_number', 'project_number','office_classification']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};

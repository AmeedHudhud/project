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
        $table->integer('id')->autoIncrement();

        $table->string('Violation_number');
        $table->enum('Response', ['Answered', 'Not answered'])->default('Not answered');
        $table->string('project_number');
        $table->integer('office_classification');

        // Define a shorter name for the unique constraint
        $table->unique(['Violation_number', 'project_number', 'office_classification'], 'violations_unique');

        // You can add foreign key constraints here if needed
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

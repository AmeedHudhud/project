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
        Schema::create('projects', function (Blueprint $table) {
            // $table->id();
            $table->string('project_number')->primary();
            $table->string('governorate');
            $table->string('designing_engineering_office');
            $table->string('project_name');
            $table->integer('widget');
            $table->integer('the_basin');
            $table->string('region');
            $table->integer('spacae');
            $table->enum('project_status', ['Suspended', 'Under Execution', 'Under Execution/Completed Construction']);
            $table->string('Laboratory_name');//foriegn key in laboratories table
            $table->integer('contractor_engineer_number');//foriegn key in enginners table
            $table->foreignId('contractor_id')->constrained();//foriegn key in contractor table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

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
        Schema::create('engineer_project', function (Blueprint $table) {
            $table->integer('engineer_number');
            $table->string('project_number');
            $table->primary(['engineer_number', 'project_number']);
            $table->unique(['engineer_number', 'project_number']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineer_project');
    }
};

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
            // $table->id();
            // $table->timestamps();
            $table->integer('number_of_fines');
            $table->string('project_number');
            $table->unsignedInteger('office_classification');

            $table->primary(['project_number', 'office_classification']);
            $table->unique(['project_number', 'office_classification']);

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

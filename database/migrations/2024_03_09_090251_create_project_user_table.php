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
        Schema::create('project_user', function (Blueprint $table) {
            // $table->id();
            $table->string('project_number');
            $table->string('email');

            $table->primary(['project_number','email']);
            $table->unique(['email','project_number']);

            $table->foreign('project_number')->references('project_number')->on('projects')->onDelete('cascade');
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');

        });

        // Schema::table('project_user', function (Blueprint $table) {
        //     $table->foreign('project_number')->references('project_number')->on('projects')->onDelete('cascade');
        //     $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user');
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->string('name');
            $table->string('email')->primary();
            $table->string('password');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('governorate');
            $table->string('mobile_number');
            $table->date('date_of_birth');
            $table->timestamps(); // Adds created_at and updated_at columns


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

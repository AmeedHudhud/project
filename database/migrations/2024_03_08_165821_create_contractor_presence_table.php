<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contractor_presence', function (Blueprint $table) {
            $table->id();
            $table->enum('presence', ['exist', 'not exist']);
            $table->enum('the_sheet', ['exist', 'not exist']);
            $table->string('notes')->nullable();
            $table->integer('engineer_number');//foreign key from enginner
            $table->string('project_number');//foreign key form project
            $table->dateTime('visiting_date');//foreign key from visit

            // $table->primary(['engineer_number', 'visiting_date']);
            $table->unique(['engineer_number', 'visiting_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractor_presence');
    }
};

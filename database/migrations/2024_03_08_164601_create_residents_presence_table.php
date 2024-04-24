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
        Schema::create('residents_presence', function (Blueprint $table) {
            $table->id();
            $table->enum('presence', ['exist', 'not exist']);
            $table->string('notes')->nullable();
            $table->integer('engineer_number');//
            $table->string('project_number');//
            $table->dateTime('visiting_date');//

            // $table->primary(['engineer_number', 'visiting_date']);
            $table->unique(['visiting_date','engineer_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents_presence');
    }
};



/*

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function engineers()
    {
        return $this->belongsToMany(Engineer::class, 'visits', 'project_number', 'engineer_number')
                    ->withPivot('visit_number', 'visiting_day', 'visiting_date');
    }
}


*/

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
        Schema::create('supervision_headquarters_photos', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('image');
            $table->dateTime('visiting_date');
            $table->primary(['image', 'visiting_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervision_headquarters_photos');
    }
};

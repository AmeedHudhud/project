<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class engineer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'engineer_number'; // Assuming 'engineer_number' is the primary key

    public function specialization()
    {
        return $this->belongsTo(specialtie::class, 'specialization_name', 'specialization_name');
    }
    public function project_contractor(){
        return $this->belongsToMany(Project::class,'contractor_engineer_number','engineer_number');
    }
}

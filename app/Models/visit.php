<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visit extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    protected $primaryKey = 'visit_number';

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_number', 'project_number');
    }
    public function correspondence()
    {
        return $this->belongsTo(Correspondence::class);
    }
}

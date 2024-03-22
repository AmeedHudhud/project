<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use HasFactory;

    // public function users(){
    //     return $this->belongsToMany(User::class);
    // }

    protected $casts = [
        'project_number' => 'string',
    ];

    protected $fillable = [
        'project_number',
        'governorate',
        'designing_engineering_office',
        'project_name',
        'widget',
        'the_basin',
        'region',
        'spacae',
        'Laboratory_name',
        'contractor_engineer_number',
        'contractor_id',
    ];

    public $timestamps = false;
    protected $primaryKey = 'project_number';
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_number', 'email');
    }

    public function laboratory()
    {
        return $this->belongsTo(laboratorie::class, 'Laboratory_name', 'Laboratory_name');
    }

    public function contractor()
    {
        return $this->belongsTo(contractor::class);
    }
    public function contractor_enginner()
    {
        return $this->belongsTo(engineer::class, 'contractor_engineer_number', 'engineer_number');
    }
    public function visit()
    {
        return $this->hasMany(visit::class, 'project_number', 'project_number');
    }



}

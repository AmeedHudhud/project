<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class violation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    // protected $primaryKey = ['Violation_number','project_number','office_classification'];


}

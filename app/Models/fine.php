<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fine extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded=[];
    protected $primaryKey = 'office_classification';
    public $incrementing = false; // Since the keys are not auto-incrementing

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laboratorie extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'Laboratory_name'=>'string'
    ];
    protected $primaryKey = 'Laboratory_name'; // Assuming 'Laboratory_name' is the primary key

    public function projects()
    {
        return $this->hasMany(Project::class, 'Laboratory_name', 'Laboratory_name');
    }

}

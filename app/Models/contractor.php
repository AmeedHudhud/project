<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contractor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    protected $primaryKey = 'id'; // Assuming 'id' is the primary key

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

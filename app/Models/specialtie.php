<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialtie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded=[];
    protected $casts = [
        'specialization_name'=>'string'
    ];
    protected $primaryKey = 'specialization_name'; // Assuming 'specialization_name' is the primary key

    public function engineers()
    {
        return $this->hasMany(engineer::class, 'specialization_name', 'specialization_name');
    }
}

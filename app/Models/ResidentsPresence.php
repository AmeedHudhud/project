<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentsPresence extends Model
{
    use HasFactory;

    protected $table = 'residents_presence';
    protected $guarded = [];

    public $timestamps = false;

}

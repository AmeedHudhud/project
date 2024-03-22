<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class correspondence extends Model
{
    use HasFactory;

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}

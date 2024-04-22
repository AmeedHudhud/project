<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class violation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded=[];

    // protected $primaryKey = 'Violation_number'; // Disable automatic primary key handling

    // Override the delete method to handle deletion based on composite primary key
    // public function delete()
    // {
    //     // Ensure that both primary key columns are set
    //     if (!isset($this->{$this->getKeyName()})) {
    //         return false;
    //     }

    //     // Perform the delete operation using composite primary key
    //     return static::where('Violation_number', $this->Violation_number)
    //         ->where('office_classification', $this->office_classification)
    //         ->delete();
    // }

    // // Define the primary key columns
    // public function getKeyName()
    // {
    //     return 'Violation_number,office_classification'; // Return a string representation of the composite primary key
    // }

    // Disable auto-incrementing behavior
    // public $incrementing = false;

}

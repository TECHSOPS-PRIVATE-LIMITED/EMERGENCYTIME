<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityTreatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_id',
        'treatment_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityMedicalStaff extends Model
{
    use HasFactory;

    protected $fillable = ['facility_id', 'medical_staff_id'];
}

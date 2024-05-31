<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalStaffSpecialty extends Model
{
    use HasFactory;

    protected  $table = "medical_staff_specialties";

    protected $fillable = [
        'medical_staff_id',
        'specialty_id'
    ];
}

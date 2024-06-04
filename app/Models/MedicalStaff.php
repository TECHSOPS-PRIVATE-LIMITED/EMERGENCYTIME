<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MedicalStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'medical_license_number',
        'gender',
        'current_employment',
        'dob',
        'address',
        'phone',
        'description',
        'image',
        'user_id'
    ];

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'facility_medical_staff');
    }

    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'medical_staff_specialties', 'medical_staff_id', 'specialty_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

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
        'facility_id',
        'image',
        'user_id'
    ];

    // Facility
    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }

    // Specialties
    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'medical_staff_specialty', 'medical_staff_id', 'specialty_id');
    }

    //user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'email',
        'phone_number',
        'address',
        'city',
        'state',
        'postal_code',
        'country_id',
        'number_of_beds',
        'hipaa_status',
        'opening_hours',
        'closing_hours',
        'emergency_contact',
        'website',
        'longitude',
        'latitude',
        'user_id'
    ];

    //user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //medical staff
    public function medicalStaff(): HasMany
    {
        return $this->hasMany(MedicalStaff::class);
    }

    // Equipment
    public function equipment(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'facility_equipment', 'facility_id', 'equipment_id');
    }

    // Treatments
    public function treatments(): BelongsToMany
    {
        return $this->belongsToMany(Treatment::class, 'facility_treatment', 'facility_id', 'treatment_id');
    }

// Country
public function country(): BelongsTo
{
    return $this->belongsTo(Country::class);
}

}

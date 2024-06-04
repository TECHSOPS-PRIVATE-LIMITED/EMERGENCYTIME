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

    public function medicalStaffs(): BelongsToMany
    {
        return $this->belongsToMany(MedicalStaff::class, 'facility_medical_staff');
    }

    public function equipments(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'facility_equipment', 'facility_id', 'equipment_id');
    }

    public function treatments(): BelongsToMany
    {
        return $this->belongsToMany(Treatment::class, 'facility_treatments', 'facility_id', 'treatment_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }


}

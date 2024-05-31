<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function medicalStaff(): BelongsToMany
    {
        return $this->belongsToMany(MedicalStaff::class, 'medical_staff_specialties', 'specialty_id', 'medical_staff_id');
    }

    //user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

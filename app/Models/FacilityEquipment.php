<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_id',
        'equipment_id'
    ];
}

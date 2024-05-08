<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = [
        'name',
        'description',
        'last_maintenance_date',
        'image',
        'user_id'
    ];

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'facility_equipment', 'equipment_id', 'facility_id');
    }

    public function setLastMaintenanceDateAttribute($value): void
    {
        if (empty($value)) {
            $this->attributes['last_maintenance_date'] = null;
        } else {
            $this->attributes['last_maintenance_date'] = Carbon::parse($value)->format('Y-m-d');
        }
    }


    //user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

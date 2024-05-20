<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'disease_name',
        'description',
        'user_id'
    ];

    // facility
    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'facility_treatment', 'treatment_id', 'facility_id');
    }

    //user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

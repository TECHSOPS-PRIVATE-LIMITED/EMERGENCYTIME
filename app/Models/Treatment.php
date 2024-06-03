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
        'category_id',
        'disease_name',
        'description',
        'user_id',
        'precautions',
        'symptoms',
        'medications',
        'procedures'
        ];

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'facility_treatments', 'treatment_id', 'facility_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}

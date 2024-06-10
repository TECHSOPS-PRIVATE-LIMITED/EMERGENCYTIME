<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplicateModelToken extends Model
{
    use HasFactory;

    protected $fillable = ['model_token'];
}
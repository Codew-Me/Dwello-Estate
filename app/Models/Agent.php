<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'bio',
        'image',
        'specialization',
        'experience_years',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}

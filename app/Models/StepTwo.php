<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepTwo extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = [
        'two_factor_enabled' => 'boolean',
    ];
}

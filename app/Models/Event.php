<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'city', 'location', 'description', 'stage_date', 'banner', 'duration', 'audience', 'attention', 'is_draft'
    ];
}

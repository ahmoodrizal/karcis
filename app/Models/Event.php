<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'city', 'location', 'description', 'stage_date', 'banner', 'duration', 'audience', 'attention', 'is_draft'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

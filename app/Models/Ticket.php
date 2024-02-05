<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'code', 'name', 'slug', 'description', 'price', 'quota'
    ];

    // Atribut yang akan di-append ke output JSON
    // protected $appends = ['is_sold_out'];

    public function getIsSoldOutAttribute()
    {
        return $this->quota == $this->transactions_count;
    }

    public function getIsPurchasedAttribute()
    {
        if (!Auth::check()) return false;

        return Transaction::where([
            ['ticket_id', '=', $this->id],
            ['status', '!=', 'canceled']
        ])->whereUserId(Auth::id())->exists();
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

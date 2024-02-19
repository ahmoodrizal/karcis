<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ticket_id', 'unique_code', 'status', 'payment_url', 'total_price', 'expired_at', 'payment_method', 'payment_va_bank', 'payment_va_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function event()
    {
        return $this->hasOneThrough(Event::class, Ticket::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $events = Event::latest()->limit(4)->get();
        return view('welcome', compact('events'));
    }

    public function myTransaction()
    {
        $transactions = Transaction::with('ticket.event')
            ->whereUserId(auth()->user()->id)->latest()->get();

        return view('user.transaction.index', compact('transactions'));
    }

    public function eventDetail(Event $event)
    {
        $lowestTicket = Ticket::whereBelongsTo($event)->orderBy('price')->first();

        return view('user.event.detail', compact('event', 'lowestTicket'));
    }

    public function tickets(Event $event)
    {
        return view('user.ticket.ticket', compact('event'));
    }

    public function checkout(Ticket $ticket)
    {
        if ($ticket->isPurchased) {
            return redirect(route('user.transactions'));
        }

        return view('user.transaction.checkout', compact('ticket'));
    }
}

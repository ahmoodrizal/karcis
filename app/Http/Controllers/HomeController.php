<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $events = Event::with(['tickets' => function ($query) {
            $query->orderBy('price')->take(2);
        }])
            ->where('is_draft', 'false')->latest()->limit(4)->get();

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
        if ($event->is_draft) {
            return redirect(route('welcome'));
        }

        $lowestTicket = Ticket::whereBelongsTo($event)->orderBy('price')->first();

        return view('user.event.detail', compact('event', 'lowestTicket'));
    }

    public function tickets(Event $event)
    {
        if ($event->is_draft) {
            return redirect(route('welcome'));
        }

        $event = Event::where('id', $event->id)
            ->with(['tickets' => function ($query) {
                $query->withCount(['transactions' => function ($query) {
                    $query->where('status', '!=', 'canceled');
                }]);
            }])
            ->first();

        return view('user.ticket.ticket', [
            'event' => $event
        ]);
    }

    public function checkout(Ticket $ticket)
    {
        if ($ticket->event->is_draft) {
            return redirect(route('welcome'));
        }

        if ($ticket->quota == $ticket->transactions()->where('status', '!=', 'canceled')->count()) {
            return redirect(route('event.tickets', $ticket->event));
        }

        if ($ticket->isPurchased) {
            return redirect(route('user.transactions'));
        }

        return view('user.transaction.checkout', compact('ticket'));
    }
}

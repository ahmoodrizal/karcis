<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $events = Event::latest()->limit(4)->get();
        return view('welcome', compact('events'));
    }

    public function myTransaction()
    {
        return view('user.transaction.index');
    }

    public function eventDetail(Event $event)
    {
        return view('user.event.detail', compact('event'));
    }

    public function tickets(Event $event)
    {
        return view('user.ticket.ticket', compact('event'));
    }

    public function checkout(Ticket $ticket)
    {
        return view('user.transaction.checkout', compact('ticket'));
    }
}

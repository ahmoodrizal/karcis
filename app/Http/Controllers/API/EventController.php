<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Success Fetch Events Data',
            'events' => Event::latest()->get()
        ]);
    }

    public function show(Event $event)
    {
        $data = Event::with('tickets')->whereId($event->id)->first();

        return response()->json([
            'message' => 'Success Fetch Event Detail',
            'event' => $data
        ]);
    }

    public function tickets(Event $event)
    {
        $tickets = $event->tickets;

        return response()->json([
            'message' => 'Success fetch event tickets',
            'tickets' => $tickets,
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

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
}

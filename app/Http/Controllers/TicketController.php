<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with('event')
            ->withCount([
                'transactions' => function ($query) {
                    $query->where('status', '!=', 'canceled');
                }
            ])
            ->latest()->paginate(10);


        return view('admin.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('admin.ticket.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'integer'],
            'quota' => ['required', 'integer']
        ]);

        $data['code'] = Str::random(8);
        $data['event_id'] = $event->id;
        $data['slug'] = Str::slug($request['name']);

        Ticket::create($data);

        return redirect(route('admin.events.show', $event->slug));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('admin.ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'integer'],
            'quota' => ['required', 'integer']
        ]);

        $data['slug'] = Str::slug($request['name']);

        $ticket->update($data);

        return redirect(route('admin.events.show', $ticket->event->slug));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}

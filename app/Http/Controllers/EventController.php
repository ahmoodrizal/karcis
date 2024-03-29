<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(8);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'city' => ['required'],
            'description' => ['required'],
            'stage_date' => ['required', 'date'],
            'presale_date' => ['required', 'date', 'before:stage_date'],
            'banner' => ['required', 'mimes:jpg,png,jpeg', 'image'],
            'duration' => ['required'],
            'audience' => ['nullable'],
            'attention' => ['nullable'],
        ]);

        $data['slug'] = Str::slug($request['name']);

        if ($request->hasFile('banner')) {
            // upload image
            $image = $request->file('banner');
            $image->storeAs('public/banners', $image->hashName());
            $data['banner'] = $image->hashName();
        }

        Event::create($data);

        return redirect(route('admin.events.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // $event::with('tickets');
        return view('admin.event.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'city' => ['required'],
            'description' => ['required'],
            'stage_date' => ['required', 'date'],
            'presale_date' => ['required', 'date', 'before:stage_date'],
            'banner' => ['nullable', 'mimes:jpg,png,jpeg', 'image'],
            'duration' => ['required'],
            'audience' => ['nullable'],
            'attention' => ['nullable'],
        ]);

        $data['slug'] = Str::slug($request['name']);

        if ($request->hasFile('banner')) {
            // upload image
            $image = $request->file('banner');
            $image->storeAs('public/banners', $image->hashName());

            // delete old image
            Storage::delete('public/banners/' . $event->banner);

            $data['banner'] = $image->hashName();
        }

        $event->update($data);

        return redirect(route('admin.events.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function toogleStatus(Event $event)
    {
        $event->update([
            'is_draft' => !$event->is_draft,
        ]);

        return redirect(route('admin.events.index'));
    }
}

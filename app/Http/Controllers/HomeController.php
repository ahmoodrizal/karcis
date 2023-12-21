<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $events = Event::latest()->limit(4)->get();
        return view('welcome', compact('events'));
    }
}

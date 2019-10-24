<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {

        try {
            $events = Event::all();

            if (sizeOf($events) > 0) {
                return view('event/events', ['eventData' => $events]);
            } else {
                return view('event/events', ['eventData' => []]);
            }
        } catch (\Exception $e) {
            return view('event/events', ['eventData' => []]);
        }
    }
}

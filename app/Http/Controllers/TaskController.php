<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getEventTasks($id)
    {
        return view('event/tasks/eventTasks');
    }
}

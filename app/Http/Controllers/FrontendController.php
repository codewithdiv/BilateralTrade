<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Document;

class FrontendController extends Controller
{
    public function event(){
        $events = Event::orderBy('id', 'desc')->get();
        return view('ourevent', compact('events'));
    }
}
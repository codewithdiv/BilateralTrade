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

    public function document(){
        $documents = Document::orderBy('id', 'desc')->get();
        return view('downloads', compact('documents'));
    }

    public function welcomeBladeEvent() {
        // $events = Event::orderby('id', 'desc')->get();
        $events = Event::latest()->paginate(3);

        return view('welcome', compact('events'));
    }

    public function eventDetails($eventDetail){

        $eventDetail = Event::findOrFail($eventDetail);
        return view('details', ['eventDetail' => $eventDetail]);

        // $eventDetail = Event::orderBy('id', 'desc')->get();
        // return view('details', ['eventDetail'=>$eventDetail]);
    }
}
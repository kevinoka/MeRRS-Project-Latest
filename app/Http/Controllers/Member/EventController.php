<?php

namespace MeRRS\Http\Controllers\Member;

use MeRRS\RequestPage;
use MeRRS\Http\Controllers\Controller;

class EventController extends Controller
{
    public function loadEvents()
    {
        $events = RequestPage::where('status',1)->get();
        return response()->json($events);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function store(Request $request)
    {
        Event::create([
            'company_id' => $request->company_id,
            'event_type_id' => $request->event_type_id,
            'title' => $request->title,
            'description' => $request->description,
            'contact' => $request->contact,
        ]);

        return back()->with('success', 'Событие успешно добавлено');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;

class NotificationController extends Controller
{

    public function index()
    {
        $query = Notification::where('user_id', Auth::user()->id)->where('viewed', false);
        $notifications = $query->paginate(10);
        $amount = $query->count();

        return view('notifications.index', ["notifications" => $notifications, 'amount' => $amount]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

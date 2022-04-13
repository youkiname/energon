<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $user->settings([
            'notification_email' => $request->notification_email,
        ]);

        return redirect()->route('settings.index')
            ->with('success', 'Настройки сохранены');
    }
}

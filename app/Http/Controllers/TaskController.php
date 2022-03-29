<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {

        return view('tasks.index', ["tasks" => Task::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        $task = Task::create([
            'title' => $request->title,
            'priority' => 0,
            'start_date' => "2022-03-12 11:50",
            'end_date' => "2022-03-12 12:50",
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Задача успешно добавлена');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {

        return view('tasks.index', ["tasks" => $this->collectAllTasks()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        $date = Carbon::createFromFormat('d.m.Y', $request->date)->toDateString();

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => 0,
            'date' => $date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Задача успешно добавлена');
    }

    private function collectAllTasks() {
        $dates = DB::table('tasks')
                ->select('date')
                ->groupBy('date')
                ->get();
        $tasks = [];
        foreach($dates as $date) {
            $tasks[$date->date] = Task::where('date', $date->date)->get();
        };
        return $tasks;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', ["tasks" => $this->collectAllTasks()]);
    }

    public function show(Task $task)
    {
        return view('tasks.show', ["task" => $task]);
    }

    public function store(StoreTaskRequest $request)
    {
        $date = Carbon::createFromFormat('d.m.Y', $request->date)->toDateString();

        $task = Task::create([
            'title' => $request->title,
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
            'description' => $request->description ?? '',
            'task_priority_id' => $request->input_priority,
            'task_status_id' => 1,
            'date' => $date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return back()->with('success', 'Задача успешно добавлена');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with([
            'success' => 'Задача успешно удалена.'
        ]);
    }

    private function collectAllTasks() {
        $dates = DB::table('tasks')
                ->select('date')
                ->groupBy('date')
                ->get();
        $tasks = [];
        foreach($dates as $date) {
            $humanDate = Carbon::create($date->date)->toFormattedDateString();
            $tasks[$humanDate] = Task::where('date', $date->date)->get();
        };
        return $tasks;
    }
}

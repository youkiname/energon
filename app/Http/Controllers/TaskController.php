<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\Notification;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
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
        if($task->company) {
            $this->createNotification($task);
            $this->createEvent($task);
        }

        return back()->with('success', 'Задача успешно добавлена');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(StoreTaskRequest $request, Task $task)
    {
        $task->title = $request->title;
        $task->description = $request->description;
        $task->description = $request->description ?? '';
        $task->date = $request->date;
        $task->start_time = $request->start_time;
        $task->end_time = $request->end_time;

        $task->save();

        return redirect()->route('tasks.show', ['task' => $task])->with([
            'success' => 'Задача успешно изменена.'
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with([
            'success' => 'Задача успешно удалена.'
        ]);
    }
    private function createNotification(Task $task)
    {
        Notification::create([
            'user_id' => $task->company->manager->id,
            'title' => 'Новая задача: ' . $task->title,
            'content' => 'Для компании "' . $task->company->fullName() . '" добавлена новая задача',
            'link' => route('tasks.show', ['task' => $task]),
        ]);
    }

    private function createEvent(Task $task)
    {
        Event::create([
            'title' => 'Новая задача',
            'description' => $task->description,
            'company_id' => $task->company->id,
            'event_type_id' => 4  # тип комментарий
        ]);
    }
}

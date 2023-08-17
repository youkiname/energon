<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\Notification;
use App\Models\Event;
use App\Models\User;
use App\Models\TaskClosingRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function show(Task $task)
    {        
        $user = Auth::user();
        $isWaitingConfirmation = TaskClosingRequest::where('task_id', $task->id)->exists() && $user->isMainManager();
        return view('tasks.show', [
            "task" => $task,
            "isWaitingConfirmation" => $isWaitingConfirmation, 
        ]);
    }

    public function store(StoreTaskRequest $request)
    {
        $date = Carbon::createFromFormat('d.m.Y', $request->date)->toDateString();
        $task = Task::create([
            'title' => $request->title,
            'company_id' => intval($request->company_id) != 0 ? $request->company_id : null,
            'creator_id' => Auth::user()->id,
            'target_user_id' => $request->target_user_id ?? Auth::user()->id,
            'description' => $request->description ?? '',
            'task_priority_id' => $request->input_priority,
            'task_status_id' => $request->status_id,
            'date' => $date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        if($task->company) {
            $this->createNotification($task);
            $this->createEvent($task);
        }

        if ($request->previousTaskId) {
            // если задача обновляется, то устанавливаем 
            // статус предыдущей задачи на выполнен.
            $previousTask = Task::find($request->previousTaskId);
            $previousTask->task_status_id = 4;
            $previousTask->save();
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

    public function closeCompany(Task $task)
    {
        if (auth()->user()->isMainManager()) {
            TaskClosingRequest::where('task_id', $task->id)->delete();
            $task->task_status_id = 4; // статус Выполнена.
            $task->save();
            $company = $task->company;
            $company->company_status_id = 5; // статус контрагента - Закрыт.
            $company->save();
            $this->createSuccessfulCompanyClosingNotification($task);
            return redirect()->route('tasks.show', ['task' => $task])->with([
                'success' => 'Клиент и задача успешно закрыты.'
            ]);
        }
        
        $this->createCompanyClosingRequest($task);
        return redirect()->route('tasks.show', ['task' => $task])->with([
            'success' => 'Клиент будет закрыт после подтверждения главным менеджером.'
        ]);
    }

    public function rejectClosingRequest(Task $task)
    {
        TaskClosingRequest::where('task_id', $task->id)->delete();
        $this->createFailedCompanyClosingNotification($task);
        return redirect()->route('tasks.show', ['task' => $task])->with([
            'success' => 'Запрос на закрытие клиента отклонён.'
        ]);
    }

    private function createNotification(Task $task)
    {
        $notification = Notification::create([
            'user_id' => $task->company->manager->id,
            'title' => 'Новая задача: ' . $task->title,
            'content' => 'Для компании "' . $task->company->fullName() . '" добавлена новая задача',
            'link' => route('tasks.show', ['task' => $task]),
        ]);

        $targetUser = $task->company->manager;
        if ($targetUser->settings && $targetUser->settings['notification_email']) {
            Mail::to($task->company->manager->email)->send(new NotificationMail($notification));
        }
    }

    private function createCompanyClosingRequest(Task $task) {
        if ($this->isTaskWaitingConfirmation($task)) {
            return;
        }
        TaskClosingRequest::create([
            'task_id' => $task->id,
            'manager_id' => Auth::user()->id,
        ]);
        $this->createCompanyClosingNotification($task);
    }

    private function isTaskWaitingConfirmation(Task $task) {
        $request = TaskClosingRequest::where('task_id', $task->id)
        ->first();
        return $request;
    }

    private function createCompanyClosingNotification(Task $task) {
        $mainManagers = User::where('role_id', '<', 3)->get();
        foreach($mainManagers as $mainManager) {
            Notification::create([
                'user_id' => $mainManager->id,
                'title' => 'Запрос на закрытие клиента от ' . Auth::user()->name,
                'content' => $task->title . '. ' . $task->description,
                'link' => route('tasks.show', ['task' => $task]),
            ]);
        }
    }

    private function createSuccessfulCompanyClosingNotification(Task $task)
    {
        Notification::create([
            'user_id' => $task->target_user_id,
            'title' => 'Запрос на закрытие клиента подтверждён.',
            'content' => $task->title . '. ' . $task->description,
            'link' => route('tasks.show', ['task' => $task]),
        ]);
    }

    private function createFailedCompanyClosingNotification(Task $task)
    {
        Notification::create([
            'user_id' => $task->target_user_id,
            'title' => 'Закрытие клиента - отклонено.',
            'content' => $task->title . '. ' . $task->description,
            'link' => route('tasks.show', ['task' => $task]),
        ]);
    }

    private function createEvent(Task $task)
    {
        Event::create([
            'title' => 'Добавлена задача',
            'creator_id' => Auth::user()->id,
            'description' => $task->description,
            'company_id' => $task->company->id,
            'event_type_id' => 6  # тип новая задача
        ]);
    }
}

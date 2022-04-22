@extends('layouts.app')

@section('title', "Задача: " . $task->title)

@section('content')
    <div class="content-box__info-item">
        <div class="container">
            <div class="message-box">

                <div class="message-box__left">
                    <div class="request-info">
                        @if($task->company)
                            <div class="request-info__item">
                                <p>Контрагент</p>
                                <a href="{{ route('companies.show', ['company'=>$task->company]) }}" 
                                class="blacklink">{{ $task->company->name }}</a>
                            </div>
                        @endif  
                        <div class="request-info__item">
                            <p>Дата создания</p>
                            <b>{{ $task->humanDate() }}</b>
                        </div>
                        <div class="request-info__item">
                            <p>Ответственный менеджер</p>
                            <b>{{ $task->creator->name }}</b>
                        </div>
                        <livewire:task-status-select :task="$task"/>
                        <div class="request-info__item request-info__priority
                                    request-info__priority_{{ $task->priority->engName }}">
                            <p>Приоритет</p>
                            <b><i></i> {{ $task->priority->name }}</b>
                        </div>
                        <div class="request-info__item remove-task-box">
                            <a href="{{ route('tasks.edit', ['task'=>$task]) }}" class="edit-task">Изменить</a>
                            <p>или</p>
                            <a href="javascrirpt:void(0)" class="remove-task" data-toggle="confirmation"
                            onclick="adminConfirm(function() {
                                document.getElementById('removeTask').submit();
                            })">Удалить задачу</a>

                            <form action="{{ route('tasks.destroy', ['task' => $task]) }}"
                                  method="post" id="removeTask">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>

                <div class="message-box__right">
                    <div class="request-messages">
                        <div class="request-messages-top">
                            <b>Задача #{{ $task->id }}</b>
                            <div class="title">{{ $task->title }}</div>
                            <div class="desc">{{ $task->description }}</div>
                        </div>
                        @if($task->isExpired())
                        <div class="task-expired-message">
                            <div class="message-form message-error">
                                Крайний срок выполнения задачи истек {{ $task->deadlineDiff() }}.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

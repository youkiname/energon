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
                            <p>Добавил</p>
                            <b>{{ $task->creator->name }}</b>
                        </div>
                        @if($task->targetUser)
                        <div class="request-info__item">
                            <p>Ответственный менеджер</p>
                            <b>{{ $task->targetUser->name }}</b>
                        </div>
                        @endif
                        <livewire:task-status-select :task="$task"/>
                        <div class="request-info__item request-info__priority
                                    request-info__priority_{{ $task->priority->engName }}">
                            <p>Приоритет</p>
                            <b><i></i> {{ $task->priority->name }}</b>
                        </div>
                        <div class="request-info__item remove-task-box">
                            @if(!$task->isCompleted())
                                <button class="edit-task"
                                style="margin-bottom: 10px;"
                                onclick="document.getElementById('').submit()"
                                >Выполнить</button>

                            
                                <button class="remove-task" data-toggle="confirmation"
                                onclick="adminConfirm(function() {
                                    document.getElementById('closeCompanyForm').submit();
                                })">
                                @if($isWaitingConfirmation)
                                Подтвердить закрытие клиента
                                @else
                                Закрыть клиента
                                @endif
                                </button>
                                @if($isWaitingConfirmation)
                                <button class="remove-task" style="margin-top: 10px;"
                                onclick="document.getElementById('rejectRequestForm').submit()"
                                >Отклонить закрытие клиента</button>
                                @endif
                            @endif

                            <form action="{{ route('tasks.closeCompany', ['task' => $task]) }}"
                                  method="post" id="closeCompanyForm">
                                @csrf
                                @method('POST')
                            </form>
                            <form action="{{ route('tasks.rejectClosingRequest', ['task' => $task]) }}"
                                  method="post" id="rejectRequestForm">
                                @csrf
                                @method('POST')
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
                        @if($task->company)
                        <div class="request-messages-top" style="padding-bottom: 0px;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <b style="margin-bottom: 0px;">Контактные данные контрагента. Статус клиента - {{ $task->company->status->name }}</b>
                            </div>
                            
                            <div class="elem-item-list">
                                @foreach($task->company->employees as $employee)
                                <div class="elem-item-box" style="background-color: #f4f6f6; padding: 20px 20px 16px 20px;">
                                    <div class="elem-item-box__top">
                                        <span>{{ $employee->position }}</span>
                                        <b>{{ $employee->getFullName() }}</b>
                                    </div>
                                    <div class="elem-item-box__bottom">
                                        @if(count($employee->phones) > 0)
                                        <div>
                                            @foreach($employee->phones as $phone)
                                            <span>{{ $phone->phoneType->name }}</span>
                                            <b><a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a></b>
                                            @endforeach
                                        </div>
                                        @endif
                                        @if(count($employee->emails) > 0)
                                        <div>
                                            <span>Электронная почта</span>
                                            @foreach($employee->emails as $email)
                                            <b><a href="mailto:{{ $email->email }}">{{ $email->email }}</a></b>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <livewire:chat :chatId="$task->id"/> 
                </div>
            </div>
        </div>
    </div>
@endsection

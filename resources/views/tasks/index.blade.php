@extends('layouts.app')

@section('title', "Планировщик задач")

@section('content')
<div class="content-box__info-item">
    <div class="container">
        <div class="plans-box">
            <div class="plans-box__left">
                <div class="plans-calendar">
                </div>

                <div class="plans-request">
                    <div class="plans-request-info">
                        <div class="plans-request-img"><img src="img/request-ico.svg" alt=""></div>
                        <div class="plans-request-title">Новая заметка</div>
                        <div class="plans-request-desc">Добавленная заметка отображается в блоке *планировщика справа, через него вы можете редактировать текущие заметки или смещаь время их реализации на другой срок</div>
                        <a href="#" class="btn-blue">Добавить</a>
                    </div>

                    <div class="plans-request-form">
                        <div class="title">Добавить</div>
                        <form action="{{ route('tasks.store') }}" method="POST" 
                        id="new-task-form" class="form-request" enctype="multipart/form-data">
                            @csrf
                            <div class="form-request__item">
                                <label for="title">Заголовок</label>
                                <input type="text" id="title" name="title">
                            </div>
                            <div class="form-request__item">
                                <label for="description">Описание</label>
                                <textarea id="description" name="description"></textarea>
                            </div>
                            <div class="form-request__item">
                                <label for="">Приоритет</label>
                                <div class="priority-box">
                                    <label class="priority priority-middle" for="middle">
                                        <input type="radio" name="input-priorites" id="middle"> <span><i></i></span>
                                    </label>
                                    <label class="priority priority-low" for="low">
                                        <input type="radio" name="input-priorites" id="low"> <span><i></i></span>
                                    </label>
                                    <label class="priority priority-high" for="high">
                                        <input type="radio" name="input-priorites" id="high"> <span><i></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-request__item">
                                <label for="date">Дата</label>
                                <input class="date-request" type="text" id="date" name="date">
                            </div>
                            <div class="dates-request">
                                <input type="time" id="start_time" name="start_time">
                                <input type="time" id="end_time" name="end_time">
                            </div>
                            <button class="btn-blue" type="submit">Добавить</button>
                        </form>
                        
                    </div>
                </div>

                
            </div>
            <div class="plans-box__right">
                <a href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                <div class="dates-plans scrollbar-outer">
                @foreach($tasks as  $day=>$dailyTasks)
                    <div class="date-plan-item">
                        <div class="title">{{ $day }}</div>
                        @foreach($dailyTasks as $task)
                        <div class="date-notes">
                            <div class="date-note-item green">
                                <div class="time">
                                    <div class="time-start">{{ $task->start_time }}</div>
                                    <div class="time-finish">{{ $task->end_time }}</div>
                                </div>
                                <div class="date-note-desc">
                                    <div class="name-note">{{ $task->title }}</div>
                                    <div class="desc-note">{{ $task->description }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

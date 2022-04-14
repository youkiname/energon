@extends('layouts.app')

@section('title', "Задача: " . $task->title)

@section('content')
<div class="container">
    <div class="plans-request-form" style="max-width: 400px;">
        <div class="title">Редактирование задачи</div>
        <form action="{{ route('tasks.update', ['task'=>$task]) }}" method="POST" 
        class="form-request" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-request__item">
                <label>Заголовок</label>
                <input type="text" name="title" value="{{ $task->title }}">
            </div>
            <div class="form-request__item">
                <label for="description">Описание</label>
                <textarea id="description" name="description">{{ $task->description }}</textarea>
            </div>
            <div class="form-request__item">
                <label>Дата</label>
                <input type="date" name="date" value="{{ $task->date }}">
            </div>
            <div class="dates-request">
                <input type="time" id="start_time" name="start_time"
                value="{{ $task->start_time }}">
                
                <input type="time" id="end_time" name="end_time"
                value="{{ $task->end_time }}">
            </div>
            <button class="btn-blue" type="submit">Сохранить</button>
        </form>
    </div>
</div>

@endsection

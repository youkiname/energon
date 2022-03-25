@extends('layouts.admin')

@section('title', "Просмотр задачи #{{ $task->id }}")

@section('content')
    <div class="app">
        <h4 class="mb-4">
            <a href="{{ route('admin.tasks.index') }}">Задачи</a> / Просмотр задачи #{{ $task->id }}
        </h4>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
@endsection

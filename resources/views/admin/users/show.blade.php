@extends('layouts.admin')

@section('title', "Детальная информация о пользователе {{ $user->name }}")

@section('content')
    <div class="app">
        <h4 class="mb-4">
            <a href="{{ route('admin.users.index') }}">Пользователи</a> / {{ $user->name }}
        </h4>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.show', ['user' => $user]) }}">
                    Задачи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.edit', ['user' => $user]) }}">
                    Редактировать данные
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" data-toggle="confirmation" data-title="Вы уверены?"
                   href="#" onclick="adminConfirm(function() {
                     document.getElementById('userDelete').submit();
                   })">
                    Удалить пользователя
                </a>
                <form action="{{ route('admin.users.destroy', ['user' => $user]) }}"
                      method="post" id="userDelete">
                    @csrf
                    @method('DELETE')
                </form>
            </li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Статус</th>
                <th>Отношение</th>
                <th style="max-width: 50px">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status->name }}</td>
                    <td>{{ $task->creator_id == $user->id ? 'Добавил' : 'Ответственный' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', ['task' => $task]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 class="block w-6 h-6 fill-gray-400" style="max-width: 30px;">
                                <polygon
                                    points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"></polygon>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection

@extends('layouts.app')

@section('title', "Настройки")

@section('content')
    <div class="container-compatibility">
        @if (session()->has('success'))
            <div class="settings-success">
                <div class="message-form message-ok">{{ session('success') }}</div>
            </div>
        @endif

        <form action="{{ route('settings.store') }}" method="post">
            @csrf
            <div class="settings-list">
                <div class="settings-title">Уведомления</div>
                <pre>
                    {{ json_encode(auth()->user()->settings) }}
                </pre>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                           @if(auth()->user()->setting('notification_email')) checked @endif
                           name="notification_email" id="settingNotificationEmail">
                    <label class="form-check-label" for="settingNotificationEmail">
                        Отправлять уведомления на почту
                    </label>
                </div>
            </div>

            <div class="settings-buttons">
                <button type="submit" class="btn btn-blue">Сохранить</button>
            </div>
        </form>

        <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    </div>
@endsection

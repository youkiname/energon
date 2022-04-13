@extends('layouts.app')

@section('title', "Личный кабинет")

@section('content')
<div class="content-box__info-item">
        <div class="container">
            <div class="message-box">
                <div class="message-box__left">
                    <div class="request-info">
                        <div class="request-info__item">
                            <span>Имя</span>
                            <b>{{ $user->name }}</b>
                        </div>
                        <div class="request-info__item">
                            <span>Почта</span>
                            <b>{{ $user->email }}</b>
                        </div>
                        <div class="request-info__item">
                            <span>Роль</span>
                            <b>{{ $user->role->name }}</b>
                        </div>
                        <div class="request-info__item">
                            <a href="{{ route('password.edit') }}" class="notice-item-link">Сменить пароль</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

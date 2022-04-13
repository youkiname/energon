@extends('layouts.app')

@section('title', "Изменение пароля")

@section('content')
<div class="container">
    <div class="title-form">Изменение пароля</div>
    <form class="contragent-form" action="{{ route('password.update') }}" method="post" style="max-width:400px;">
        @csrf
        <div class="form-item">
            <a href="#" class="pass-show" tabindex="-1"></a>
            <label for="password">Новый пароль</label>
            <input id="password" type="password"
                    class="@error('password') error @enderror"
                    name="password" required autocomplete="new-password">
        </div>
        <div class="form-item">
            <a href="#" class="pass-show" tabindex="-1"></a>
            <label for="password_confirmation">Подтверждение пароля</label>
            <input id="password_confirmation" type="password"
                    class="@error('password_confirmation') error @enderror"
                    name="password_confirmation" required autocomplete="off">
        </div>
        <div class="form-btns">
                <button id="submit" class="btn-blue" type="submit">Сохранить</button>
        </div>
    </form>
    @if ($errors->any())
        <div class="message-form message-error">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
</div>
@endsection
@extends('layouts.app')

@section('title', "Редактирование сотрудника")

@section('content')
<div class="content-box__info-item">
    <form action="{{ route('employee.update', ['employee' => $employee]) }}" class="contragent-form" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h1>Редактирование сотрудника. Компания {{ $employee->company->name }}.</h1>
        <div class="personal-box">
            <div class="contragent-form__item">
                <label for="position">Должность</label>
                <input type="text" id="position" name="position" value="{{ $employee->position }}">
            </div>
            <div class="contragent-form__item">
                <label for="first_name">Имя</label>
                <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}">
            </div>
            <div class="contragent-form__item">
                <label for="last_name">Фамилия</label>
                <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}">
            </div>
            <div class="contragent-form__item">
                <label for="patronymic">Отчество</label>
                <input type="text" id="patronymic" name="patronymic" value="{{ $employee->patronymic }}">
            </div>
        </div>

        <div class="personal-phones" id="personal-phones">
            @foreach($employee->phones as $phone)
            <div class="contragent-form__item">
                <label for="phone">Рабочий телефон</label>
                <input type="tel" value="{{ $phone->phone }}" name="phone[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            @endforeach

            <a id="add-new-phone-btn" href="javascript:void(0)" class="add-card"><span>Добавить номер</span><i></i></a>
        </div>
        
        <div class="personal-mails" id="personal-mails">
            @foreach($employee->emails as $email)
            <div class="contragent-form__item">
                <label for="email">Рабочий e-mail</label>
                <input type="email" value="{{ $email->email }}" name="email[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            @endforeach
            <a id="add-new-email-btn" href="javascript:void(0)" class="add-card"><span>Добавить e-mail</span><i></i></a>
        </div>

        <div class="form-btns">
            <button type="submit" class="btn-blue">Сохранить</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        let addNewPhoneButton = document.getElementById('add-new-phone-btn');
        addNewPhoneButton.onclick = function() {
            $("#personal-phones").append(`
            <div class="contragent-form__item">
                <label for="phone">Рабочий телефон</label>
                <input type="tel" id="phone" name="phone[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `);
        };
        
        let addNewEmailButton = document.getElementById('add-new-email-btn');
        addNewEmailButton.onclick = function() {
            $("#personal-mails").append(`
            <div class="contragent-form__item">
                <label for="email">Рабочий e-mail</label>
                <input type="email" id="email" name="email[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `);
        };

        $(document).on('click', '.remove', function () {
            $(this).parents('div.contragent-form__item').remove();
        });
    });
</script>
@endsection
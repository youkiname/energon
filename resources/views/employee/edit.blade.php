@extends('layouts.app')

@section('title', 'Редактирование сотрудника')

@section('content')
    <div class="content-box__info-item">
        <form action="{{ route('employee.update', ['employee' => $employee]) }}" class="contragent-form" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <h1>Редактирование сотрудника. Компания {{ $employee->company->name }}.</h1>
            <div class="personal-box">
                <div class="contragent-form__item">
                    <label for="employee_position">Должность</label>
                    <input type="text" name="employee_position" value="{{ $employee->position }}">
                </div>
                <div class="contragent-form__item">
                    <label for="employee_last_name">Фамилия</label>
                    <input type="text" name="employee_last_name" value="{{ $employee->last_name }}">
                </div>
                <div class="contragent-form__item">
                    <label for="employee_first_name">Имя</label>
                    <input type="text" name="employee_first_name" value="{{ $employee->first_name }}">
                </div>
                <div class="contragent-form__item">
                    <label for="employee_patronymic">Отчество</label>
                    <input type="text" name="employee_patronymic" value="{{ $employee->patronymic }}">
                </div>
            </div>

            <div class="personal-phones" id="personal-phones">
                @foreach ($employee->phones as $phone)
                    <div class="contragent-form__item">
                        <label for="employee_phones">Рабочий телефон</label>
                        <input type="tel" value="{{ $phone->phone }}" name="employee_phones[]">
                        <a href="javascript:void(0)" class="remove"></a>
                    </div>
                @endforeach

                <a id="add-new-phone-btn" href="javascript:void(0)" class="add-card"><span>Добавить номер</span><i></i></a>
            </div>

            <div class="personal-mails" id="personal-mails">
                @foreach ($employee->emails as $email)
                    <div class="contragent-form__item">
                        <label for="employee_emails">Рабочий e-mail</label>
                        <input type="email" value="{{ $email->email }}" name="employee_emails[]">
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
    @include('company.components.contacts-js')
@endsection

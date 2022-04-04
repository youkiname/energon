@extends('layouts.app')

@section('title', "Добавление контрагента")

@section('content')
@include('components.decor-images')
<div class="form-contragent-wrap">
    <div class="container">
        <form action="{{ route('companies.store') }}" method="post" 
                        id="createForm" class="contragent-form">
                    @csrf
                    <div class="btn-more-box">
                        <div class="btn-el-items" style="opacity: 0;">
                            <a href="#" class="btn-el btn-del"></a>
                            <a href="#" class="btn-el btn-edit"></a>
                        </div>
                    </div>

                    <div class="contragent-form__item contragent-form__item50">
                        <label for="name">Наименование организации</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="contragent-form-box">

                        <div class="contragent-form__item">
                            <label for="ssn">ИНН</label>
                            <input type="text" id="ssn" name="ssn">
                        </div>
                        <div class="contragent-form__item">
                            <label for="legal">Правовая форма</label>
                            <input type="text" id="legal" name="legal">
                        </div>
                        <div class="contragent-form__item">
                            <label for="city">Город</label>
                            <input type="text" id="city" name="city">
                        </div>
                        <div class="contragent-form__item">
                            <label for="address">Адрес</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_type">Тип клиента</label>
                            <select name="company_type" id="cliencompany_typet_type">
                                @foreach($companyTypes as $companyType)
                                <option value="{{ $companyType->id }}">{{ $companyType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_purchase">Тип закупки</label>
                            <select name="company_purchase" id="company_purchase">
                                @foreach($companyPurchases as $companyPurchase)
                                    <option value="{{ $companyPurchase->id }}">
                                        {{ $companyPurchase->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_status">Статус клиента</label>
                            <select name="company_status" id="company_status">
                                @foreach($companyStatuses as $companyStatus)
                                    <option value="{{ $companyStatus->id }}">{{ $companyStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_potentiality">Потенциал клиента</label>
                            <select name="company_potentiality" id="company_potentiality">
                                @foreach($companyPotentialities as $companyPotentiality)
                                <option value="{{ $companyPotentiality->id }}">
                                    {{ $companyPotentiality->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="contragent-form__item big">
                            <label for="description">Описание компании</label>
                            <textarea name="description" id="description"></textarea>
                        </div>

                        <div class="personal-form">
                            <div class="personal-form__top">
                                <b>Сотрудник # 1</b>
                                <a href="javascript:void(0)" class="add-card"><span>Добавить
                                        сотрудника</span><i></i></a>
                            </div>
                            <div class="personal-box">
                                <div class="contragent-form__item">
                                    <label for="employee_position">Должность</label>
                                    <input type="text" id="employee_position" name="employee_position">
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_first_name">Имя</label>
                                    <input type="text" id="employee_first_name" name="employee_first_name">
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_last_name">Фамилия</label>
                                    <input type="text" id="employee_last_name" name="employee_last_name">
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_patronymic">Отчество</label>
                                    <input type="text" id="employee_patronymic" name="employee_patronymic">
                                </div>
                            </div>

                            <div class="personal-phones" id="personal-phones">
                                <div class="contragent-form__item">
                                    <label for="employee_phone">Рабочий телефон</label>
                                    <input type="tel" id="employee_phone" name="employee_phone[]">
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_phone">Рабочий телефон # 2</label>
                                    <input type="tel" id="employee_phone" name="employee_phone[]">
                                    <a href="javascript:void(0)" class="remove"></a>
                                </div>
                                <a id="add-new-phone-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                            </div>
                            
                            <div class="personal-mails" id="personal-mails">
                                <div class="contragent-form__item">
                                    <label for="employee_email">Рабочий e-mail</label>
                                    <input type="email" id="employee_email" name="employee_email[]">
                                </div>
                                <a id="add-new-email-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                            </div>
                        </div>

                        <div class="form-btns">
                            <button type="submit" class="btn-blue">Добавить</button>
                            <div class="message-form message-ok">Контрагент успешно добавлен</div>
                            <div class="message-form message-error">Ошибка</div>
                            <div class="message-form message-lock">Фирма занята</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var employeePhonesAmount = 2;
    var employeeEmailsAmount = 1;


    document.addEventListener('DOMContentLoaded', function(){
        let addNewPhoneButton = document.getElementById('add-new-phone-btn');
        addNewPhoneButton.onclick = function() {
            employeePhonesAmount += 1;
            $("#personal-phones").append(`
            <div class="contragent-form__item">
                <label for="employee_phone">Рабочий телефон #${employeePhonesAmount}</label>
                <input type="tel" id="employee_phone" name="employee_phone[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `);
        };
        
        let addNewEmailButton = document.getElementById('add-new-email-btn');
        addNewEmailButton.onclick = function() {
            employeeEmailsAmount += 1;
            $("#personal-mails").append(`
            <div class="contragent-form__item">
                <label for="employee_email">Рабочий e-mail #${employeeEmailsAmount}</label>
                <input type="email" id="employee_email" name="employee_email[]">
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

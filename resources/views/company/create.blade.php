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
                        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="contragent-form-box">

                        <div class="contragent-form__item">
                            <label for="ssn">ИНН</label>
                            <input type="text" id="ssn" name="ssn" class="@error('ssn') is-invalid @enderror" value="{{ old('ssn') }}">
                            @error('ssn')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contragent-form__item">
                            <label for="legal">Правовая форма</label>
                            <input type="text" id="legal" name="legal" class="@error('legal') is-invalid @enderror" value="{{ old('legal') }}">
                            @error('legal')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contragent-form__item">
                            <label for="city">Город</label>
                            <input type="text" id="city" name="city" class="@error('city') is-invalid @enderror" value="{{ old('city') }}">
                            @error('city')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contragent-form__item">
                            <label for="address">Адрес</label>
                            <input type="text" id="address" name="address" class="@error('address') is-invalid @enderror" value="{{ old('address') }}">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_type">Тип клиента</label>
                            <select name="company_type" id="cliencompany_typet_type" class="@error('company_type') is-invalid @enderror">
                                @foreach($companyTypes as $companyType)
                                <option value="{{ $companyType->id }}">{{ $companyType->name }}</option>
                                @endforeach
                            </select>
                            @error('company_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_purchase">Тип закупки</label>
                            <select name="company_purchase" id="company_purchase" class="@error('company_purchase') is-invalid @enderror">
                                @foreach($companyPurchases as $companyPurchase)
                                    <option value="{{ $companyPurchase->id }}">
                                        {{ $companyPurchase->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_purchase')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_status">Статус клиента</label>
                            <select name="company_status" id="company_status" class="@error('company_status') is-invalid @enderror">
                                @foreach($companyStatuses as $companyStatus)
                                    <option value="{{ $companyStatus->id }}">{{ $companyStatus->name }}</option>
                                @endforeach
                            </select>
                            @error('company_status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_potentiality">Потенциал клиента</label>
                            <select name="company_potentiality" id="company_potentiality" class="@error('company_potentiality') is-invalid @enderror">
                                @foreach($companyPotentialities as $companyPotentiality)
                                <option value="{{ $companyPotentiality->id }}">
                                    {{ $companyPotentiality->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('company_potentiality')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                                    <input type="text" id="employee_position" name="employee_position" 
                                    class="@error('employee_position') is-invalid @enderror" value="{{ old('employee_position') }}">
                                    @error('employee_position')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_first_name">Имя</label>
                                    <input type="text" id="employee_first_name" name="employee_first_name" 
                                    class="@error('employee_first_name') is-invalid @enderror" value="{{ old('employee_first_name') }}">
                                    @error('employee_first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_last_name">Фамилия</label>
                                    <input type="text" id="employee_last_name" name="employee_last_name" 
                                    class="@error('employee_last_name') is-invalid @enderror" value="{{ old('employee_last_name') }}">
                                    @error('employee_last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_patronymic">Отчество</label>
                                    <input type="text" id="employee_patronymic" name="employee_patronymic" 
                                    class="@error('employee_patronymic') is-invalid @enderror" value="{{ old('employee_patronymic') }}">
                                    @error('employee_patronymic')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="personal-phones" id="personal-phones">
                                <div class="contragent-form__item">
                                    <label for="employee_phones">Рабочий телефон</label>
                                    <input type="tel" name="employee_phones[]" 
                                    class="@error('employee_phones') is-invalid @enderror">
                                </div>
                                <div class="contragent-form__item">
                                    <label for="employee_phones">Рабочий телефон # 2</label>
                                    <input type="tel" name="employee_phones[]">
                                    <a href="javascript:void(0)" class="remove"></a>
                                </div>
                                <a id="add-new-phone-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                            </div>
                            
                            <div class="personal-mails" id="personal-mails">
                                <div class="contragent-form__item">
                                    <label for="employee_emails">Рабочий e-mail</label>
                                    <input type="email" name="employee_emails[]" 
                                    class="@error('employee_emails') is-invalid @enderror">
                                </div>
                                <a id="add-new-email-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                            </div>
                        </div>

                        <div class="form-btns">
                            <button type="submit" class="btn-blue">Добавить</button>
                            @if ($errors->any())
                            <div class="message-form message-error">Ошибка</div>
                            @endif                            
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
                <label for="employee_phones">Рабочий телефон #${employeePhonesAmount}</label>
                <input type="tel" name="employee_phones[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `);
        };
        
        let addNewEmailButton = document.getElementById('add-new-email-btn');
        addNewEmailButton.onclick = function() {
            employeeEmailsAmount += 1;
            $("#personal-mails").append(`
            <div class="contragent-form__item">
                <label for="employee_emails">Рабочий e-mail #${employeeEmailsAmount}</label>
                <input type="email" name="employee_emails[]">
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

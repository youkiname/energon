@extends('layouts.app')

@section('title', "Добавление контрагента")

@section('content')
@include('components.decor-images')
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-error">
        {{ Session::get('error') }}
    </div>
@endif
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
                                        <label for="">Должность</label>
                                        <input type="text">
                                    </div>
                                    <div class="contragent-form__item">
                                        <label for="">Имя</label>
                                        <input type="text">
                                    </div>
                                    <div class="contragent-form__item">
                                        <label for="">Фамилия</label>
                                        <input type="text">
                                    </div>
                                    <div class="contragent-form__item">
                                        <label for="">Отчество</label>
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="personal-phones">
                                    <div class="contragent-form__item">
                                        <label for="">Рабочий телефон</label>
                                        <input type="tel">
                                    </div>
                                    <div class="contragent-form__item">
                                        <label for="">Рабочий телефон # 2</label>
                                        <input type="tel">
                                        <a href="#" class="remove"></a>
                                    </div>
                                    <a href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                                </div>

                                <div class="personal-mails">
                                    <div class="contragent-form__item">
                                        <label for="">Рабочий e-mail</label>
                                        <input type="email">
                                    </div>
                                    <a href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
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
@endsection

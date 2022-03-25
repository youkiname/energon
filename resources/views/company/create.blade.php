@extends('layouts.app')

@section('title', "Добавление контрагента")

@section('content')
<img class="decor1" src="img/decor1.png" alt="">
<img class="decor2" src="img/decor2.png" alt="">
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
                            <label for="">Наименование организации</label>
                            <input type="text">
                        </div>
                        <div class="contragent-form-box">

                            <div class="contragent-form__item">
                                <label for="">ИНН</label>
                                <input type="text">
                            </div>
                            <div class="contragent-form__item">
                                <label for="">Правовая форма</label>
                                <input type="text">
                            </div>
                            <div class="contragent-form__item">
                                <label for="">Город</label>
                                <input type="text">
                            </div>
                            <div class="contragent-form__item">
                                <label for="">Адрес</label>
                                <input type="text">
                            </div>
                            <div class="contragent-form__item">
                                <label for="">Тип клиента</label>
                                <select name="" id="">
                                    @foreach($companyTypes as $companyType)
                                    <option value="{{ $companyType->id }}">{{ $companyType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contragent-form__item">
                                <label for="">Тип закупки</label>
                                <select name="" id="">
                                    @foreach($companyPurchases as $companyPurchase)
                                        <option value="{{ $companyPurchase->id }}">
                                            {{ $companyPurchase->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contragent-form__item">
                                <label for="">Статус клиента</label>
                                <select name="" id="">
                                    @foreach($companyStatuses as $companyStatus)
                                        <option value="{{ $companyStatus->id }}">{{ $companyStatus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contragent-form__item">
                                <label for="">Потенциал клиента</label>
                                <select name="" id="">
                                    @foreach($companyPotentialities as $companyPotentiality)
                                    <option value="{{ $companyPotentiality->id }}">
                                        {{ $companyPotentiality->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contragent-form__item big">
                                <label for="">Описание компании</label>
                                <textarea name="" id="desc-comnpany"></textarea>
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
                                <button type="submit" class="btn-blue" disabled>Добавить</button>
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

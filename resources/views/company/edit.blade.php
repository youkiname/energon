@extends('layouts.app')

@section('title', "Редактирование: " . $company->name)

@section('content')
@include('components.decor-images')

<div class="form-contragent-wrap">
    <div class="container">
        <form action="{{ route('companies.update', ['company' => $company]) }}" method="post" class="contragent-form" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="contragent-form__item contragent-form__item50">
                <label>Название компании</label>
                <input type="text" name="name" value="{{ $company->name }}">
            </div>
            <div class="contragent-form-box">
                <div class="contragent-form__item">
                    <label>ИНН</label>
                    <input type="text" value="{{ $company->ssn }}" id="ssn" name="ssn">
                </div>
                <div class="contragent-form__item">
                    <label>Правовая форма</label>
                    <input type="text" value="{{ $company->legal }}" id="legal" name="legal">
                </div>
                <div class="contragent-form__item">
                    <label>Город</label>
                    <input type="text" value="{{ $company->city }}" id="city" name="city">
                </div>
                <div class="contragent-form__item">
                    <label>Адрес</label>
                    <input type="text" value="{{ $company->address }}" id="address" name="address">
                </div>
                <div class="contragent-form__item">
                    <label for="company_type">Тип клиента</label>
                    <select name="company_type" id="company_type">
                    @foreach($companyTypes as $companyType)
                        <option value="{{ $companyType->id }}"
                        @if($companyType->id == $company->companyType->id) selected @endif
                        >{{ $companyType->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="contragent-form__item">
                    <label for="company_purchase">Тип закупки</label>
                    <select name="company_purchase" id="company_purchase">
                        @foreach($companyPurchases as $companyPurchase)
                        <option value="{{ $companyPurchase->id }}"
                        @if($companyPurchase->id == $company->purchase->id) selected @endif
                        >{{ $companyPurchase->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="contragent-form__item">
                    <label for="company_status">Статус клиента</label>
                    <select name="company_status" id="company_status">
                        @foreach($companyStatuses as $companyStatus)
                        <option value="{{ $companyStatus->id }}"
                        @if($companyStatus->id == $company->status->id) selected @endif
                        >{{ $companyStatus->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="contragent-form__item">
                    <label for="company_potentiality">Потенциал клиента</label>
                    <select name="company_potentiality" id="company_potentiality">
                    @foreach($companyPotentialities as $companyPotentiality)
                        <option value="{{ $companyPotentiality->id }}"
                        @if($companyPotentiality->id == $company->potentiality->id) selected @endif
                        >
                            {{ $companyPotentiality->name }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="contragent-form__item big">
                    <label for="description">Описание компании</label>
                    <textarea name="description" id="description">{{ $company->description }}</textarea>
                </div>
                
            </div>
            <div class="contragent-form-box">
                <div class="contragent-form__item">
                    <label>№ Договора</label>
                    <input type="text" value="{{ $company->details->contract_number }}" id="contract_number" name="contract_number">
                </div>
                <div class="contragent-form__item">
                    <label>№ Спецификации</label>
                    <input type="number" value="{{ $company->details->specification_number }}" id="specification_number" name="specification_number">
                </div>
                <div class="contragent-form__item">
                    <label>№ Заявки</label>
                    <input type="text" value="{{ $company->details->request_number }}" id="request_number" name="request_number">
                </div>
                <div class="contragent-form__item">
                    <label>№ Заказа</label>
                    <input type="text" value="{{ $company->details->order_number }}" id="order_number" name="order_number">
                </div>
                <div class="contragent-form__item">
                    <label>Дата заказа</label>
                    <input type="date" value="{{ $company->details->order_date }}" id="order_date" name="order_date">
                </div>
                <div class="contragent-form__item">
                    <label>Сумма заказов</label>
                    <input type="number" value="{{ $company->details->order_sum }}" id="order_sum" name="order_sum">
                </div>
                <div class="contragent-form__item">
                    <label>% Премии менеджера</label>
                    <input type="number" value="{{ $company->details->manager_premium }}" id="manager_premium" name="manager_premium">
                </div>
                <div class="contragent-form__item">
                    <label>Кол-во рабочих часов</label>
                    <input type="number" value="{{ $company->details->working_hours }}" id="working_hours" name="working_hours">
                </div>
                <div class="contragent-form__item">
                    <label>Тип оборудования</label>
                    <input type="text" value="{{ $company->details->equipment_type }}" id="equipment_type" name="equipment_type">
                </div>
            </div>
            <div class="form-btns">
                <button type="submit" class="btn-blue">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection

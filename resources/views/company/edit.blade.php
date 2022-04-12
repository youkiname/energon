@extends('layouts.app')

@section('title', "Редактирование: {{ $company->name }}")

@section('content')
@include('components.decor-images')

<div class="content-box__info-item">
    <form action="{{ route('companies.update', ['company' => $company]) }}" class="contragent-form" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="info-item-top">
            <div class="info-item-top__left">
                <div class="info-item-title">
                    <input type="text" name="name" value="{{ $company->name }}">

                    <div class="client-status">
                        <div class="select-box">
                            <span>Потенциал клиента:</span>
                            
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
                    </div>
                </div>
                <div class="info-item-content">
                    <textarea name="description" id="description">{{ $company->description }}</textarea>
                </div>
                <div class="info-item-address">
                    <div>
                        <span>ИНН</span>
                        <input type="text" value="{{ $company->ssn }}" id="ssn" name="ssn">
                    </div>
                    <div>
                        <span>Город</span>
                        <input type="text" value="{{ $company->city }}" id="city" name="city">
                    </div>
                    <div>
                        <span>Адрес</span>
                        <input type="text" value="{{ $company->address }}" id="address" name="address">
                    </div>
                </div>
            </div>
            <div class="info-item-top__right">
                <div class="item-info">
                    <span>Тип клиента</span>
                    <select name="company_type" id="company_type">
                        @foreach($companyTypes as $companyType)
                        <option value="{{ $companyType->id }}"
                        @if($companyType->id == $company->companyType->id) selected @endif
                        >{{ $companyType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item-info">
                    <span>Тип закупки</span>
                    <select name="company_purchase" id="company_purchase">
                        @foreach($companyPurchases as $companyPurchase)
                        <option value="{{ $companyPurchase->id }}"
                        @if($companyPurchase->id == $company->purchase->id) selected @endif
                        >{{ $companyPurchase->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item-info">
                    <span>Статус клиента</span>
                    <select name="company_status" id="company_status">
                        @foreach($companyStatuses as $companyStatus)
                        <option value="{{ $companyStatus->id }}"
                        @if($companyStatus->id == $company->status->id) selected @endif
                        >{{ $companyStatus->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item-info">
                    <span>Ответственный менеджер </span>
                    <b>{{ $company->manager->name }}</b>
                </div>
            </div>
        </div>

        <div class="elem-line">
            <div class="elem-line__content">
                <div>
                    <span>№ Договора</span>
                    <input type="text" value="{{ $company->details->contract_number }}" id="contract_number" name="contract_number">
                </div>
                <div>
                    <span>№ Спецификации</span>
                    <input type="number" value="{{ $company->details->specification_number }}" id="specification_number" name="specification_number">
                </div>
                <div>
                    <span>№ Заявки</span>
                    <input type="text" value="{{ $company->details->request_number }}" id="request_number" name="request_number">
                </div>
                <div>
                    <span>№ Заказа</span>
                    <input type="text" value="{{ $company->details->order_number }}" id="order_number" name="order_number">
                </div>
                <div>
                    <span>Дата заказа</span>
                    <input type="date" value="{{ $company->details->order_date }}" id="order_date" name="order_date">
                </div>
                <div>
                    <span>Сумма заказов</span>
                    <input type="number" value="{{ $company->details->order_sum }}" id="order_sum" name="order_sum">
                </div>
                <div>
                    <span>% Премии менеджера</span>
                    <input type="number" value="{{ $company->details->manager_premium }}" id="manager_premium" name="manager_premium">
                </div>
                <div>
                    <span>Кол-во рабочих часов</span>
                    <input type="number" value="{{ $company->details->working_hours }}" id="working_hours" name="working_hours">
                </div>
                <div>
                    <span>Тип оборудования</span>
                    <input type="text" value="{{ $company->details->equipment_type }}" id="equipment_type" name="equipment_type">
                </div>
            </div>
        </div>

        <div class="form-btns">
            <button type="submit" class="btn-blue">Сохранить</button>
        </div>
    </form>
</div>
@endsection

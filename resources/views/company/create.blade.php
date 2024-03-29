@extends('layouts.app')

@section('title', "Добавление контрагента")

@section('content')
@include('components.decor-images')
<div class="form-contragent-wrap">
    <div class="container">
        <form action="{{ route('companies.store') }}" method="post" 
        class="contragent-form dropzone" enctype="multipart/form-data"
        >
                    @csrf
                    <div class="contragent-form__item contragent-form__item50">
                        <x-input name="name" labelName="Наименование организации" />
                    </div>
                    <div class="contragent-form-box">

                        <div class="contragent-form__item">
                            <x-input name="ssn" labelName="ИНН" />
                        </div>
                        <div class="contragent-form__item">
                            <x-input name="legal" labelName="Правовая форма"/>
                        </div>
                        <div class="contragent-form__item">
                            <x-input name="city" labelName="Регион"/>
                        </div>
                        <div class="contragent-form__item">
                            <x-input name="address" labelName="Адрес"/>
                        </div>
                        <div class="contragent-form__item">
                            <label for="company_type">Тип клиента</label>
                            <select name="company_type" id="company_type" class="@error('company_type') is-invalid @enderror">
                                @foreach($companyTypes as $companyType)
                                <option value="{{ $companyType->id }}" 
                                    @if(old("company_type") == $companyType->id) selected @endif
                                >{{ $companyType->name }}</option>
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
                                    <option value="{{ $companyPurchase->id }}"
                                    @if(old("company_purchase") == $companyPurchase->id) selected @endif
                                    >
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
                                    <option value="{{ $companyStatus->id }}"
                                    @if(old("company_status") == $companyStatus->id) selected @endif
                                    >{{ $companyStatus->name }}</option>
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
                                <option value="{{ $companyPotentiality->id }}"
                                @if(old("company_potentiality") == $companyPotentiality->id) selected @endif
                                >
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

                        <x-employee-form />

                        <div class="images-preview" id="images-preview">

                        </div>
                        <div class="contragent-form__item" style="width: 100%;">
                            <label for="images[]">Добавить изображения (не обязательно)</label>
                            <input type="file"  accept=".jpg,.jpeg,.png" multiple="multiple" name="images[]" id="imagesInput">
                            <button type="button" class="btn-cancel" onclick="clearImageFiles()" 
                            style="margin-top: 10px; padding: 10px 0 10px 0;">Очистить файлы</button>
                        </div>

                        <div class="form-btns">
                            <button type="submit" class="btn-blue">Добавить контрагента</button>
                            @if ($errors->any())
                            <div class="message-form message-error">Ошибка</div>
                            @endif                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('company.components.image-drag-js')
</div>
@endsection

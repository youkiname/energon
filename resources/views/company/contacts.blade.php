@extends('layouts.app')

@section('title', "Детальный просмотр: {{ $company->name }}")

@section('content')
@include('components.decor-images')

@include('company.components.show-details')


<div class="elem-information">
    <div class="container">
        <div class="elem-information__btns">
            <a href="{{ route('companies.show', ['company' => $company]) }}" class="btn-switch" data-switch="tab_1">Лента событий</a>
            <a href="{{ route('companies.contacts', ['company' => $company]) }}" class="btn-switch active" data-switch="tab_2">Контакты</a>
            <a href="{{ route('companies.tasks', ['company' => $company]) }}" class="btn-switch" data-switch="tab_3">Задачи</a>
        </div>
        <a href="javascript:void(0)" class="btn-filter"><span>Фильтр</span></a>
        <div class="elem-information__box">
            <div class="elem-item" id="tab_2">
                <div class="elem-item-title">Сотрудники</div>
                @include('company.components.employees-list', ['employees' => $company->employees])
                <form action="{{ route('employee.store') }}" class="contragent-form" 
                method="post" enctype="multipart/form-data" id="employee-form"
                style="@if (!$errors->any()) display: none; @endif">
                    @csrf
                    @method('post')
                    <input type="hidden" name="company_id" value="{{ $company->id }}">

                    <x-employee-form />
                    <div class="form-btns">
                        <button type="submit" class="btn-blue">Добавить</button>                            
                    </div>
                </form>

                <div class="elem-item-title">Связанные организации</div>
                <div class="elem-item-list">
                    @each('company.components.bundled-company', $company->bundledCompanies, 'company')
                    <a href="javascript:void(0)" class="add-card" id="add-new-bundle-btn"><span>Добавить</span><i></i></a>
                </div>
                <div style="display: none;" id="bundle-company-select">
                    <livewire:bundle-company-select :currentCompany="$company"/>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('#add-new-employee-btn').click(function() {
            if ($('#employee-form').is(":visible")) {
                return
            }
            $('#employee-form').show();
            $('#add-new-employee-btn').hide();
        });

        $('#add-new-bundle-btn').click(function() {
            if ($('#bundle-company-select').is(":visible")) {
                return
            }
            $('#bundle-company-select').show();
            $('#add-new-bundle-btn').hide();
        });
    });
</script>
@endsection

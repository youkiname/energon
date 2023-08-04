@extends('layouts.app')

@section('title', "Детальный просмотр: " . $company->name)

@section('content')
@include('components.decor-images')

@include('company.components.show-details')


<div class="elem-information">
    <div class="container">
        <div class="elem-information__btns">
        <a href="{{ route('companies.show', ['company' => $company]) }}" class="btn-switch active" data-switch="tab_1">Лента событий</a>
            <a href="{{ route('companies.contacts', ['company' => $company]) }}" class="btn-switch" data-switch="tab_2">Контакты</a>
            <a href="{{ route('companies.tasks', ['company' => $company]) }}" class="btn-switch" data-switch="tab_3">События</a>
        </div>
        <a href="javascript:void(0)" class="btn-filter"><span>Фильтр</span></a>
        <div class="elem-information__box">
            <div class="elem-item" id="tab_1">
            <livewire:company-events :company="$company"/>
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

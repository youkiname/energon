@extends('layouts.app')

@section('title', "Контрагенты")

@section('content')
@include('components.decor-images')
<div class="content-box__top-line">
    <div class="container">
        <h1>Контрагенты</h1>
        <a href="{{ route('companies.create') }}" class="btn-new-event"><span>Добавить контрагента</span><img src="img/plus-blue.svg" alt=""></a>
        <div class="filters">
            <div class="search">
                <input type="search" id="search" placeholder="Поиск">
            </div>
            <div class="filters-right">
                <div class="select-box">
                    <span>Статус:</span>
                    <select name="" id="">
                        <option value="Все">Все</option>
                        <option value="ВсеВсеВсеВсе">ВсеВсеВсеВсеВсеВсе</option>
                        <option value="ВсеВсе">ВсеВсе</option>
                        <option value="ВсеВсеВсе">ВсеВсеВсе</option>
                    </select>
                </div>
                @include('livewire.company.abc')
            </div>

        </div>
    </div>
</div>

<div class="table-wrap">
    <div class="container">
        <div class="table">
            <div class="table-tr">
                <div class="table-th">Компания</div>
                <div class="table-th">Город</div>
                <div class="table-th">Контактное лицо</div>
                <div class="table-th">телефон</div>
                <div class="table-th">E-mail</div>
                <div class="table-th">ИНН</div>
                <div class="table-th">тип клиента</div>
                <div class="table-th">Статус</div>
            </div>
            @foreach($companies as $company)
                @include('company.table-row', ['company' => $company])
            @endforeach
        </div>
    </div>
</div>
@endsection

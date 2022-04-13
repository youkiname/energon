@extends('layouts.app')

@section('title', "Статистика")

@section('content')
<div class="content-box__info-item">
    <div class="container">
        <div class="stats-box">
            <div class="stat-item green">
                <div class="stat-item-top">
                    <div class="stat-item-name">Всего контрагентов</div>
                </div>
                <div class="stat-item-bottom">
                    <div class="stat-col">{{ $companiesCount }}</div>
                    <div class="stat-date">Последний {{ $lastCompanyDate }}</div>
                </div>
            </div>

            <div class="stat-item red">
                <div class="stat-item-top">
                    <div class="stat-item-name">Всего сотрудников</div>
                </div>
                <div class="stat-item-bottom">
                    <div class="stat-col">{{ $employeesCount }}</div>
                    <div class="stat-date">Последний {{ $lastEmployeeDate }}</div>
                </div>
            </div>

            <div class="stat-item yellow">
                <div class="stat-item-top">
                    <div class="stat-item-name">Всего задач</div>
                </div>
                <div class="stat-item-bottom">
                    <div class="stat-col">{{ $tasksCount }}</div>
                    <div class="stat-date">Последняя {{ $lastTaskDate }}</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

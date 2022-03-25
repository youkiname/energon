@extends('layouts.app')

@section('title', "Статистика")

@section('content')
<div class="content-box__info-item">
    <div class="container">
        <div class="stats-box">
            <div class="stat-item green">
                <div class="stat-item-top">
                    <div class="stat-item-name">Всего заказов</div>
                </div>
                <div class="stat-item-bottom">
                    <div class="stat-col">325</div>
                    <div class="stat-date">Последний 12.02.2021</div>
                </div>
            </div>

            <div class="stat-item red">
                <div class="stat-item-top">
                    <div class="stat-item-name">Всего заказов</div>
                </div>
                <div class="stat-item-bottom">
                    <div class="stat-col">325</div>
                    <div class="stat-date">Последний 12.02.2021</div>
                </div>
            </div>

            <div class="stat-item yellow">
                <div class="stat-item-top">
                    <div class="stat-item-name">Всего заказов</div>
                </div>
                <div class="stat-item-bottom">
                    <div class="stat-col">325</div>
                    <div class="stat-date">Последний 12.02.2021</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

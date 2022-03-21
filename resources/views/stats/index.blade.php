<x-app-layout title="Статистика" wrapper_css="wrapper-vn">

    <x-slot name="header">
        <div class="content-box__back-line">
            <div class="container-compatibility">
                <a href="{{ route('companies.index') }}" class="back">Назад</a>
                <div class="form-contragent-top">
                    <div class="title">Статистика</div>
                </div>
            </div>
        </div>
    </x-slot>

    <div>
        <!-- include tailwind -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <div class="container-compatibility">
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

</x-app-layout>

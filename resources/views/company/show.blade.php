@extends('layouts.app')

@section('title', "Детальный просмотр: {{ $company->name }}")

@section('content')
@include('components.decor-images')

@include('company.components.show-details')


<div class="elem-information">
    <div class="container">
        <div class="elem-information__btns">
        <a href="{{ route('companies.show', ['company' => $company]) }}" class="btn-switch active" data-switch="tab_1">Лента событий</a>
            <a href="{{ route('companies.contacts', ['company' => $company]) }}" class="btn-switch" data-switch="tab_2">Контакты</a>
            <a href="{{ route('companies.tasks', ['company' => $company]) }}" class="btn-switch" data-switch="tab_3">Задачи</a>
        </div>
        <a href="javascript:void(0)" class="btn-filter"><span>Фильтр</span></a>
        <div class="elem-information__box">
            <div class="elem-item" id="tab_1">
                <div class="events-box">
                    <div class="events-items">
                        <div class="new-event-box" style="display: none;">
                            <div class="new-event-box__top">
                                <div class="new-event-date">Сегодня, 14:37</div>
                                <a href="#">Отменить</a>
                            </div>
                            <form action="/" method="post" class="form-new-task events-item task new-task green">
                            
                                <div class="title">Новое событие</div>
                                <div class="form-new-task__box">
                                    <div class="form-new-task__item">
                                        <label for="">Название события</label>
                                        <input type="text" value="Заказ">
                                    </div>
                                    <div class="form-new-task__item">
                                        <label for="">Дата</label>
                                        <input type="text" class="date-new-event" value="">
                                    </div>
                                </div>
                                <div class="form-new-task__item">
                                    <label for="">Контактное лицо</label>
                                    <input type="text" value="Резник Евгений Александрович">
                                </div>
                                <div class="form-new-task__item">
                                    <label for="">Основания </label>
                                    <textarea name="">Являясь всего лишь частью общей картины, независимые государства, вне зависимости от их уровня, должны быть функционально разнесены</textarea>
                                </div>
                                <button class="btn-blue">Создать</button>
                            </form>
                        </div>
                        
                        <div class="events-item task">
                            <div class="events-item-date">Сегодня, 14:37</div>
                            <div class="events-item-title">Поставлена задача: Перезвонить клиенту 12.08.2017</div>
                            <div class="events-item-info">
                                <div class="events-item-info-status">Заказ</div>
                                <div class="events-item-info-note">
                                    <b>2 дня назад</b>
                                    <span>Счет #95762 оплатили, перезвонить через неделю по поводу доставки</span>
                                </div>
                                <div class="events-item-info-person">
                                    <b>Контактное лицо</b>
                                    <span>Резник Евгений Александрович</span>
                                </div>
                            </div>
                        </div>

                        <div class="events-item request">
                            <div class="events-item-date">Сегодня, 14:37</div>
                            <div class="events-item-title">Заявка: Перезвонить клиенту 12.08.2017</div>
                            <div class="events-item-info">
                                <div class="events-item-info-status">Заявка</div>
                                <div class="events-item-info-note">
                                    <b>2 дня назад</b>
                                    <span>Отправил счет на заказ #95762</span>
                                </div>
                                <div class="events-item-info-person">
                                    <b>Контактное лицо</b>
                                    <span>Резник Евгений Александрович</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="events-dates">
                        <select name="select-event" id="select-event">
                            <option value="Добавить событие" selected disabled>Добавить событие</option>
                            <option value="Заявка">Заявка</option>
                            <option value="Заказ">Заказ</option>
                            <option value="Задача">Задача</option>
                            <option value="Телефонный звонок">Телефонный звонок</option>
                            <option value="Комментарий">Комментарий</option>
                        </select>
                        <div class="select-box">
                            <span>Категория:</span>
                            <select name="" id="">
                                <option value="Телефонный звонок">Телефонный звонок</option>
                                <option value="Заказ">Заказ</option>
                                <option value="Заявка">Заявка</option>
                                <option value="Заявка">Задача</option>
                            </select>
                        </div>
                        <div class="date-range">
                            <div class="date-range-item">
                                <input placeholder="С" class="start_one" data-multiple-dates-separator=" - " type="text" class="date" id="datepicker">
                            </div>
                            <div class="date-range-item">
                                <input placeholder="По" type="text" class="date end_one">
                            </div>
                        </div>
                    </div>
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

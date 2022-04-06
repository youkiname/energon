@extends('layouts.app')

@section('title', "Детальный просмотр: {{ $company->name }}")

@section('content')
@include('components.decor-images')

<div class="content-box__info-item">
    <div class="container">
        <div class="info-item-top">
            <div class="info-item-top__left">
                <div class="info-item-title">
                    <b>{{ $company->name }}</b>
                    <div class="info-item-title-box">
                        <select name="status-select" id="status-select">
                            <option selected disabled value="Статус">Статус</option>
                            @foreach($companyStatuses as $companyStatus)
                                <option value="{{ $companyStatus->id }}">{{ $companyStatus->name }}</option>
                            @endforeach
                        </select>
                        <span class="in-work2">{{ $company->status->name }}</span>
                    </div>

                    <div class="client-status">
                        <div class="select-box">
                            <span>Потенциал клиента:</span>
                            
                            <select name="" id="">
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


                    <div class="btn-more-box">
                        <a class="btn-more" href="javascrirpt:void(0)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <div class="btn-el-items">
                            <a href="#" class="btn-el btn-del"></a>
                            <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                        </div>
                    </div>

                </div>
                <div class="info-item-content">
                    <p>{{ $company->description }}</p>
                </div>
                <div class="info-item-address">
                    <div>
                        <span>ИНН</span>
                        <b>{{ $company->ssn }}</b>
                    </div>
                    <div>
                        <span>Город</span>
                        <b>{{ $company->city }}</b>
                    </div>
                    <div>
                        <span>Адрес</span>
                        <b>{{ $company->address }}</b>
                    </div>
                </div>
            </div>
            <div class="info-item-top__right">
                <div class="item-info">
                    <span>Тип клиента</span>
                    <b>{{ $company->companyType->name }}</b>
                </div>
                <div class="item-info">
                    <span>Тип закупки</span>
                    <b>{{ $company->purchase->name }}</b>
                </div>
                <div class="item-info">
                    <span>Статус клиента</span>
                    <b>{{ $company->status->name }}</b>
                </div>
                <div class="item-info">
                    <span>Ответственный менеджер </span>
                    <b>John Doe</b>
                </div>
                <div class="btn-more-box">
                    <a class="btn-more" href="javascrirpt:void(0)">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <div class="btn-el-items">
                        <a href="#" class="btn-el btn-del"></a>
                        <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="elem-line">
            <div class="elem-line__content">
                <div>
                    <span>№ Договора</span>
                    <b>{{ $company->details->contract_number }}</b>
                </div>
                <div>
                    <span>№ Спецификации</span>
                    <b>{{ $company->details->specification_number }}</b>
                </div>
                <div>
                    <span>№ Заявки</span>
                    <b>{{ $company->details->request_number }}</b>
                </div>
                <div>
                    <span>№ Заказа</span>
                    <b>{{ $company->details->order_number }}</b>
                </div>
                <div>
                    <span>Дата заказа</span>
                    <b>{{ $company->details->order_date }}</b>
                </div>
                <div>
                    <span>Сумма заказов</span>
                    <b>{{ $company->details->order_sum }}</b>
                </div>
                <div>
                    <span>% Премии менеджера</span>
                    <b>{{ $company->details->manager_premium }}</b>
                </div>
                <div>
                    <span>Кол-во рабочих часов</span>
                    <b>{{ $company->details->working_hours }}</b>
                </div>
                <div>
                    <span>Тип оборудования</span>
                    <b>{{ $company->details->equipment_type }}</b>
                </div>
            </div>
            <div class="btn-more-box">
                <a class="btn-more" href="javascrirpt:void(0)">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <div class="btn-el-items">
                    <a href="#" class="btn-el btn-del"></a>
                    <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="elem-information">
    <div class="container">
        <div class="elem-information__btns">
            <a href="javascript:void(0)" class="btn-switch" data-switch="tab_1">Лента событий</a>
            <a href="javascript:void(0)" class="btn-switch active" data-switch="tab_2">Контакты</a>
            <a href="javascript:void(0)" class="btn-switch" data-switch="tab_3">Задачи</a>
        </div>
        <a href="javascript:void(0)" class="btn-filter"><span>Фильтр</span></a>
        <div class="elem-information__box">
            <div class="elem-item" id="tab_1" style="display: none;">
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

                    <div class="elem-item-box">
                        <div class="elem-item-box-title">OOO “Smit-Yarcevo”</div>
                        <div class="el-org">
                            <span>ИНН</span>
                            <b>6727014649</b>
                        </div>
                        <div class="el-org">
                            <span>Адрес</span>
                            <b>301650, Тульская область, г. Новомосковск, 
                                ул. Калинина, д. 15</b>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>
                    <div class="elem-item-box">
                        <div class="elem-item-box-title">OOO “Sk STROY”</div>
                        <div class="el-org">
                            <span>ИНН</span>
                            <b>7733306088</b>
                        </div>
                        <div class="el-org">
                            <span>Адрес</span>
                            <b>115580, Москва, ул. Шипиловская, д. 58, оф. 1</b>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                </div>
            </div>
            <div class="elem-item" id="tab_3" style="display: none;">
                <div class="elem-item-title">Сотрудникииииии</div>
                <div class="elem-item-list">

                    <div class="elem-item-box">
                        <div class="elem-item-box__top">
                            <span>Начальник коммерческого отдела</span>
                            <b>Резник Евгений Александрович</b>
                        </div>
                        <div class="elem-item-box__bottom">
                            <div>
                                <span>Номер телефона</span>
                                <b><a href="tel:+79030283090">+7 903 028 30 90</a></b>
                            </div>
                            <div>
                                <span>Электронная почта</span>
                                <b><a href="mailto:rea@megavatt-lip.ru">rea@megavatt-lip.ru</a></b>
                            </div>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>

                    <div class="elem-item-box">
                        <div class="elem-item-box__top">
                            <span>Руководитель отдела закупок</span>
                            <b>Королева Ольга Ивановна</b>
                        </div>
                        <div class="elem-item-box__bottom">
                            <div>
                                <span>Номер телефона</span>
                                <b><a href="tel:+79030283090">+7 903 031 93 42</a></b>
                            </div>
                            <div>
                                <span>Электронная почта</span>
                                <b><a href="mailto:koroleva.avr@gmail.com">koroleva.avr@gmail.com</a></b>
                            </div>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>

                    <div class="elem-item-box">
                        <div class="elem-item-box__top">
                            <span>Начальник коммерческого отдела</span>
                            <b>Дешевых Константин Сергеевич</b>
                        </div>
                        <div class="elem-item-box__bottom">
                            <div>
                                <span>Номер телефона</span>
                                <b><a href="tel:+79030283090">+7 960 141 82 06</a></b>
                            </div>
                            <div>
                                <span>Электронная почта</span>
                                <b><a href="mailto:dks@megavatt-lip.ru">dks@megavatt-lip.ru</a></b>
                            </div>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>

                    <div class="elem-item-box">
                        <div class="elem-item-box__top">
                            <span>Начальник коммерческого отдела</span>
                            <b>Шемякин Андрей</b>
                        </div>
                        <div class="elem-item-box__bottom">
                            <div>
                                <span>Номер телефона</span>
                                <b><a href="tel:+79042816843">+7 904 281 68 43</a></b>
                            </div>
                            <div>
                                <span>Номер телефона</span>
                                <b><a href="tel:+7 962 351 25 50">+7 962 351 25 50</a></b>
                            </div>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>

                    <div class="elem-item-box">
                        <div class="elem-item-box__top">
                            <span>Руководитель отдела закупок</span>
                            <b>Пашков Владимир Николаевич</b>
                        </div>
                        <div class="elem-item-box__bottom">
                            <div>
                                <span>Номер телефона</span>
                                <b><a href="tel:+79030287435">+7 903 028 74 35</a></b>
                            </div>
                            <div>
                                <span>Электронная почта</span>
                                <b><a href="mailto:pvn@megavatt-lip.ru">pvn@megavatt-lip.ru</a></b>
                            </div>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                </div>


                <div class="elem-item-title">Связанные организации</div>
                <div class="elem-item-list">

                    <div class="elem-item-box">
                        <div class="elem-item-box-title">OOO “Smit-Yarcevo”</div>
                        <div class="el-org">
                            <span>ИНН</span>
                            <b>6727014649</b>
                        </div>
                        <div class="el-org">
                            <span>Адрес</span>
                            <b>301650, Тульская область, г. Новомосковск, 
                                ул. Калинина, д. 15</b>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>
                    <div class="elem-item-box">
                        <div class="elem-item-box-title">OOO “Sk STROY”</div>
                        <div class="el-org">
                            <span>ИНН</span>
                            <b>7733306088</b>
                        </div>
                        <div class="el-org">
                            <span>Адрес</span>
                            <b>115580, Москва, ул. Шипиловская, д. 58, оф. 1</b>
                        </div>
                        <div class="btn-more-box">
                            <a class="btn-more" href="javascrirpt:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="btn-el-items">
                                <a href="#" class="btn-el btn-del"></a>
                                <a href="#" class="btn-el btn-edit"></a>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('company.components.contacts-js')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('#add-new-employee-btn').click(function() {
            if ($('#employee-form').is(":visible")) {
                return
            }
            $('#employee-form').show();
            $('#add-new-employee-btn').hide();
        });
    });
</script>
@endsection

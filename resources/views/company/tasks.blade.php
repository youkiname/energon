@extends('layouts.app')

@section('title', "Детальный просмотр: {{ $company->name }}")

@section('content')
@include('components.decor-images')

@include('company.components.show-details')


<div class="elem-information">
    <div class="container">
        <div class="elem-information__btns">
        <a href="{{ route('companies.show', ['company' => $company]) }}" class="btn-switch" data-switch="tab_1">Лента событий</a>
            <a href="{{ route('companies.contacts', ['company' => $company]) }}" class="btn-switch" data-switch="tab_2">Контакты</a>
            <a href="{{ route('companies.tasks', ['company' => $company]) }}" class="btn-switch active" data-switch="tab_3">Задачи</a>
        </div>
        <a href="javascript:void(0)" class="btn-filter"><span>Фильтр</span></a>
        <div class="elem-information__box">
            <div class="elem-item" id="tab_3">
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

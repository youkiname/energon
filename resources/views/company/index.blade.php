@extends('layouts.app')

@section('title', "Контрагенты")

@section('content')
<img class="decor1" src="img/decor1.png" alt="">
<img class="decor2" src="img/decor2.png" alt="">
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

                <div class="btn-abc"></div>
                <div class="alfavite">
                    <div class="alfavite-box">
                        <a href="#">А</a>
                        <a href="#">Б</a>
                        <a href="#">В</a>
                        <a href="#">Г</a>
                        <a href="#">Д</a>
                        <a href="#">Е</a>
                        <a href="#">Ё</a>
                        <a href="#">Ж</a>
                        <a href="#">З</a>
                        <a href="#">И</a>
                        <a href="#">Й</a>
                        <a href="#">К</a>
                        <a href="#">Л</a>
                        <a href="#">М</a>
                        <a href="#">Н</a>
                        <a href="#">О</a>
                        <a href="#">П</a>
                        <a href="#">Р</a>
                        <a href="#">С</a>
                        <a href="#">Т</a>
                        <a href="#">У</a>
                        <a href="#">Ф</a>
                        <a href="#">Х</a>
                        <a href="#">Ц</a>
                        <a href="#">Ч</a>
                        <a href="#">Ш</a>
                        <a href="#">Щ</a>
                        <a href="#">Ъ</a>
                        <a href="#">Ы</a>
                        <a href="#">Ь</a>
                        <a href="#">Э</a>
                        <a href="#">Ю</a>
                        <a href="#">Я</a>
                    </div>
                </div>
                <div class="alfavite-select">
                    <select name="alfavite-sel" id="alfavite-sel">
                        <option value="A">А</option>
                        <option value="Б">Б</option>
                        <option value="В">В</option>
                        <option value="Г">Г</option>
                        <option value="Д">Д</option>
                        <option value="Е">Е</option>
                        <option value="Ё">Ё</option>
                        <option value="Ж">Ж</option>
                        <option value="З">З</option>
                        <option value="И">И</option>
                        <option value="Й">Й</option>
                        <option value="К">К</option>
                        <option value="Л">Л</option>
                        <option value="М">М</option>
                        <option value="Н">Н</option>
                        <option value="О">О</option>
                        <option value="П">П</option>
                        <option value="Р">Р</option>
                        <option value="С">С</option>
                        <option value="Т">Т</option>
                        <option value="У">У</option>
                        <option value="Ф">Ф</option>
                        <option value="Х">Х</option>
                        <option value="Ц">Ц</option>
                        <option value="Ч">Ч</option>
                        <option value="Ш">Ш</option>
                        <option value="Щ">Щ</option>
                        <option value="Ъ">Ъ</option>
                        <option value="Ы">Ы</option>
                        <option value="Ь">Ь</option>
                        <option value="Э">Э</option>
                        <option value="Ю">Ю</option>
                        <option value="Я">Я</option>
                    </select>
                </div>
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
            <div class="table-tr">
                <div class="table-td">
                    <b>ОАО</b>
                    <span>Строительные технологии</span>
                </div>
                <div class="table-td">
                    <b>ВО</b>
                    <span>Воронеж</span>
                </div>
                <div class="table-td">
                    <b>Генеральный директор</b>
                    <span>Максимов Кадим Назимович</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79102807901">+7 910 280 79 01</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:f1981@rambler.ru">f1981@rambler.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="del">Delete</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>ОКС</b>
                    <span>Левобережник</span>
                </div>
                <div class="table-td">
                    <b>ВО</b>
                    <span>Воронеж</span>
                </div>
                <div class="table-td">
                    <b>Генеральный директор</b>
                    <span>Сорокин Владимир Сергеевич</span>
                    <b>Главный инженер</b>
                    <span>Бышок Александр Владимирович</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79267493069">+7 926 749 30 69</a></span>
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+74732482632">+7 473 248 26 32</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:f1981@vs.sorokin@yandex.ru">vs.sorokin@yandex.ru</a></span>
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:post-oks@mail.ru">post-oks@mail.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="in-work">В работе</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>АО</b>
                    <span>Система-Сервис</span>
                </div>
                <div class="table-td">
                    <b>МО</b>
                    <span>Москва</span>
                </div>
                <div class="table-td">
                    <b>-</b>
                    <span>Григорьев Константин Валентинович</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+74952237100">+7 495 223 71 00</a></span>
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79267792901">+7 926 779 29 01</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:gvk@step-mpo.ru">gvk@step-mpo.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="in-work2">В работе</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>ООО</b>
                    <span>СК Строй</span>
                </div>
                <div class="table-td">
                    <b>МО</b>
                    <span>Москва</span>
                </div>
                <div class="table-td">
                    <b>Генеральный директор</b>
                    <span>Каташонов Алексей Сергеевич</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79151369296">+7 915 136 92 96</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:sk-stroy2010@yandex.ru">sk-stroy2010@yandex.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="in-work2">В работе</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>ООО</b>
                    <span>Альянсстроймонтаж</span>
                </div>
                <div class="table-td">
                    <b>КО</b>
                    <span>Казань</span>
                </div>
                <div class="table-td">
                    <b>Генеральный директор</b>
                    <span>Аглеев Ренат Шамильевич</span>
                    <b>--</b>
                    <span>Геннадий Рыжжкевич</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79600501491">+7 960 050 14 91</a></span>
                    <b>--</b>
                    <span><a href="tel:+79872191220">+7 987 219 12 20</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:rgv.78.sd@yandex.ru">rgv.78.sd@yandex.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="wait">В ожидании</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>ООО</b>
                    <span>СМИТ-Ярцево</span>
                </div>
                <div class="table-td">
                    <b>СО</b>
                    <span>Ярцево</span>
                </div>
                <div class="table-td">
                    <b>Заместитель гланого инженера</b>
                    <span>Битюк Валерий Викторович</span>
                    <b>Главный энергетик</b>
                    <span>Чирков Александр Николаевич</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79101111515">+7 910 111 15 15</a></span>
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79156401858">+7 915 640 18 58</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:batyuk@smit.su">batyuk@smit.su</a></span>
                    <b>-</b>
                    <span><a href="mailto:ba1632@yandex.ru">ba1632@yandex.ru</a></span>
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:post-oks@mail.ru">post-oks@mail.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="in-work">В работе</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>ООО</b>
                    <span>ПромЭнергоСбыт</span>
                </div>
                <div class="table-td">
                    <b>ТО</b>
                    <span>Новомосковск</span>
                </div>
                <div class="table-td">
                    <b>Заместитель гланого инженера</b>
                    <span>Лютаев Дмитрий Александрович</span>
                    <b>Начальник службы подстанций</b>
                    <span>Чирков Александр Николаевич</span>
                    <b>Специалист по размещению заказов</b>
                    <span>Немакина Наталья Николаевна</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79101111515">+7 48762 6 95 36</a></span>
                    <b>Дополнительный телефон</b>
                    <span><a href="tel:+79156401858">+7 48762 6 22 36</a></span>
                    <b>Личный телефон</b>
                    <span><a href="tel:+79156401858">+7 910 703 25 11</a></span>
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79156401858">+7 953 199 83 42</a></span>
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79156401858">+7 48762 6 50 25</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span>--</span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="in-work2">В работе</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>--</b>
                    <span>ЭЛИС-Групп</span>
                </div>
                <div class="table-td">
                    <b>МО</b>
                    <span>Москва</span>
                </div>
                <div class="table-td">
                    <b>Менеджер по снабжению</b>
                    <span>Оксана</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79101111515">+7 495 740 33 22</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:kay@elis-group.ru">kay@elis-group.ru</a></span>
                    <b>Дополнительный e-mail</b>
                    <span><a href="mailto:so@elis-group.ru">so@elis-group.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="del">Delete</a>
                </div>
            </div>

            <div class="table-tr">
                <div class="table-td">
                    <b>ООО</b>
                    <span>МЕГАВАТТ</span>
                </div>
                <div class="table-td">
                    <b>МО</b>
                    <span>Липецк</span>
                </div>
                <div class="table-td">
                    <b>Начальник коммерческого отдела</b>
                    <span>Резник Евгений Александрович</span>
                    <b>Руководитель отдела</b>
                    <span>Королева Ольга Ивановна</span>
                    <b>Инженер ПТО</b>
                    <span>Дешевых Константин Сергеевич</span>
                    <b>--</b>
                    <span>Шемякин Андрей</span>
                    <b>--</b>
                    <span>Пашков Владимир Николаевич</span>
                </div>
                <div class="table-td">
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79101111515">+7 903 028 30 90</a></span>
                    <b>Дополнительный телефон</b>
                    <span><a href="tel:+79156401858">+7 903 031 93 42</a></span>
                    <b>Личный телефон</b>
                    <span><a href="tel:+79156401858">+7 960 141 82 06</a></span>
                    <b>Рабочий телефон</b>
                    <span><a href="tel:+79156401858">+7 904 281 68 43</a></span>
                    <b>Дополнительный телефон</b>
                    <span><a href="tel:+79156401858">+7 962 351 25 50</a></span>
                    <b>Личный телефон</b>
                    <span><a href="tel:+79156401858">+7 903 028 74 35</a></span>
                </div>
                <div class="table-td">
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:rea@megavatt-lip.ru">rea@megavatt-lip.ru</a></span>
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:rea@megavatt-lip.ru">rea@megavatt-lip.ru</a></span>
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:rea@megavatt-lip.ru">rea@megavatt-lip.ru</a></span>
                    <b>Рабочий e-mail</b>
                    <span><a href="mailto:rea@megavatt-lip.ru">rea@megavatt-lip.ru</a></span>
                </div>
                <div class="table-td">
                    <b>ИНН</b>
                    <span>4826125480</span>
                </div>
                <div class="table-td">
                    <b>Тип клиента</b>
                    <span>Монтажная организация</span>
                </div>
                <div class="table-td">
                    <a href="javascript:void(0)" class="table-tr-btn"></a>
                    <a href="#" class="in-work2">В работе</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

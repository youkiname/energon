<div class="events-box">
    <div class="events-items">

        <div class="new-event-box" style="display: none;">
            <div class="new-event-box__top">
                <div class="new-event-date">Сегодня, {{ now()->format('H:i') }}</div>
                <a href="javascript:void(0)">Отменить</a>
            </div>
            <form action="/" method="post" class="form-new-task events-item task new-task green">

                <div class="title">Новое событие</div>
                <div class="form-new-task__box">
                    <div class="form-new-task__item">
                        <label for="">Название события</label>
                        <input type="text" value="Заказ">
                    </div>
                    <div class="form-new-task__item">
                        <label for="event_type">Тип события</label>
                        <select name="event_type" id="event_type">
                            <option value="1">Заявка</option>
                            <option value="2">Заказ</option>
                            <option value="3">Задача</option>
                            <option value="4">Телефонный звонок</option>
                            <option value="5">Комментарий</option>
                        </select>
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

        @forelse($company->events as $event)
            <div class="events-item task">
                <div class="events-item-date">{{ $event->created_at->diffForHumans() }}</div>
                <div class="events-item-title">{{ $event->title }}</div>
                <!--
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
                -->
            </div>
        @empty
            <div class="events-item">
                <div class="events-item-date">Список событий пуст</div>
            </div>
        @endforelse

    </div>

    <div class="events-dates">
        <a href="#" class="btn-new-event"><span>Добавить событие</span><img src="img/plus-blue.svg"
                                                                            alt=""></a>
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
                <input placeholder="С" class="start_one" data-multiple-dates-separator=" - "
                       type="text" class="date" id="datepicker">
            </div>
            <div class="date-range-item">
                <input placeholder="По" type="text" class="date end_one">
            </div>
        </div>
    </div>
</div>

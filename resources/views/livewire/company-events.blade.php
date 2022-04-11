<div class="events-box">
    <div class="events-items">
        <div class="new-event-box" id="event-form" style="display: none;">
            <div class="new-event-box__top">
                <div class="new-event-date">Сегодня, 14:37</div>
                <a href="#">Отменить</a>
            </div>
            <form action="{{ route('events.store') }}" method="post" class="form-new-task events-item task new-task green"
            enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="company_id" value="{{ $company->id }}">
                <div class="title">Новое событие</div>
                <div class="form-new-task__item">
                    <label for="">Категория</label>
                    <select name="event_type_id" class="w-100">
                        @foreach($eventTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-new-task__item">
                    <label for="">Заголовок</label>
                    <input type="text" name="title" value="">
                </div>
                <div class="form-new-task__item">
                    <label for="">Контактное лицо</label>
                    <input type="text" name="contact" value="">
                </div>
                <div class="form-new-task__item">
                    <label for="">Описание </label>
                    <textarea name="description"></textarea>
                </div>
                <button class="btn-blue">Создать</button>
            </form>
        </div>
        
        @foreach($events as $event)
        <div class="events-item task">
            <div class="events-item-date">{{ $event->date() }}</div>
            <div class="events-item-title">{{ $event->title }}</div>
            <div class="events-item-info">
                <div class="events-item-info-status">{{ $event->eventType->name }}</div>
                <div class="events-item-info-note">
                    <b>2 дня назад</b>
                    <span>{{ $event->description }}</span>
                </div>
                <div class="events-item-info-person">
                    <b>Контактное лицо</b>
                    <span>{{ $event->contact }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="events-dates">
        <button class="btn-new-event" id="add-new-event"><span>Добавить событие</span><img src="img/plus-blue.svg" alt=""></button>
        <div class="select-box">
            <span>Категория:</span>
            <select name="event_type" id="event_type">
                <option value="0">Все</option>
                @foreach($eventTypes as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
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
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('#add-new-event').click(function() {
                if ($('#event-form').is(":visible")) {
                    return
                }
                $('#event-form').show();
            });

            $("#event_type").on('change', function() {
                Livewire.emit('changeEventType', $("#event_type").val())
            });
            $('#datepicker').datepicker({
                range: 'multiple',
                showWeek: true,
                firstDay: 1,
                dateFormat: 'mm.dd.yyyy',
                onSelect: function (fd, d, picker) {
                    $(".start_one").val(fd.split("-")[0]);
                    $(".end_one").val(fd.split("-")[1]);
                    Livewire.emit('changeDateRange', {begin: d[0], end: d[1]})
                },
            });
        });
    </script>
</div>

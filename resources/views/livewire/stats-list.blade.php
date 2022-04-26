<div class="content-box__info-item">
    <div class="content-box__top-line">
        <div class="container">
            <h1>Статистика</h1>
            <div class="filters">
                <div class="filters-right">
                    <div class="select-box" wire:ignore>
                        <span>Контрагент: </span>
                        <select name="company_id" id="company_id">
                            <option value="0">Все</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->fullName() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-box" wire:ignore id="company_status_select">
                        <span>Статус: </span>
                        <select name="company_status_id" id="company_status_id">
                            <option value="0">Все</option>
                            @foreach($companyStatuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-box" wire:ignore id="company_type_select">
                        <span>Тип: </span>
                        <select name="company_type_id" id="company_type_id">
                            <option value="0">Все</option>
                            @foreach($companyTypes as $companyType)
                            <option value="{{ $companyType->id }}">{{ $companyType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-box" wire:ignore>
                        <span>Менеджер: </span>
                        <select name="manager_id" id="manager_id">
                            <option value="0">Все</option>
                            @foreach($managers as $manager)
                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-box" wire:ignore>
                        <span>Тип: </span>
                        <select name="stat_type" id="stat_type">
                            <option value="">Все</option>
                            <option value="companies">Контрагенты</option>
                            <option value="tasks">Задачи</option>
                            <option value="events">События</option>
                            <option value="calls">Звонки</option>
                            <option value="requests">Заявки</option>
                            <option value="orders">Заказы</option>
                            <option value="edits">Редактирования</option>
                            <option value="comments">Комментарии</option>
                        </select>
                    </div>
                    <div class="select-box" wire:ignore>
                        <span>Отношение: </span>
                        <select name="relation_type" id="relation_type">
                            <option value="creator_id">Добавил</option>
                            <option value="target_user_id">Ответственный</option>
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
        </div>
    </div>
    <div class="container">
        <div class="stats-box">
            @foreach($stats as $stat)
            <div class="stat-item {{ $colors[array_rand($colors, 1)] }}">
                <div class="stat-item-top">
                    <div class="stat-item-name">{{ $stat->title }}</div>
                    <p style="font-size: 0.7em;">Менеджер: {{ $stat->manager }}</p>
                    <p style="font-size: 0.7em;">
                    Контрагент: 
                    @if($selectedCompanyStatus || $selectedCompanyType)
                    отфильтровано
                    @else
                    {{ $selectedCompanyName }}
                    @endif
                    </p>
                </div>
                <div class="stat-item-bottom">
                    <div class="stat-col">{{ $stat->amount }}</div>
                    <div class="stat-date">{{ $stat->date }}</div>
                </div>
            </div>
            @endforeach()
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $("#company_id").on('change', function() {
                let value = $("#company_id").val()
                if(value != '0') {
                    $("#company_status_select").hide()
                    $("#company_type_select").hide()
                } else {
                    $("#company_status_select").show()
                    $("#company_type_select").show()
                }
                Livewire.emit('changeCompanyId', value)
            });

            $("#company_type_id").on('change', function() {
                Livewire.emit('changeCompanyTypeId', $("#company_type_id").val())
            });

            $("#company_status_id").on('change', function() {
                Livewire.emit('changeCompanyStatusId', $("#company_status_id").val())
            });

            $("#manager_id").on('change', function() {
                Livewire.emit('changeManagerId', $("#manager_id").val())
            });

            $("#stat_type").on('change', function() {
                Livewire.emit('changeStatType', $("#stat_type").val())
            });

            $("#relation_type").on('change', function() {
                Livewire.emit('changeManagerRelation', $("#relation_type").val())
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

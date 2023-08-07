<div class="content-box__top-line">
    <div class="check-ssn-popup" id="check-ssn-popup" wire:ignore.self>
        <div class="controls">
        <button onclick="hideCheckSsnPopup()" style="background: none;">x</button>
        </div>
        <h3>Проверить ИНН</h3>
        <p>{{ $checkSsnInfo }}</p>
        <input type="text" placeholder="Введите ИНН" wire:model="checkSsnValue" wire:keydown.enter="checkSsn">
        <button class="btn-blue" wire:click="checkSsn">Проверить (enter)</button>
    </div>
    <div class="container">
        <h1>Контрагенты</h1>
        <a href="{{ route('companies.create') }}" class="btn-new-event"
        style="max-width: 120px">
            <span>Добавить</span><img src="img/plus-blue.svg" alt="">
        </a>

        <button class="btn-new-event" style="margin-left: 10px; max-width: 120px"
        onclick="showCheckSsnPopup()"
        >
            <span>Проверить</span><img src="img/small-blue-arr.svg" alt="">
        </button>

        <div class="filters">
            <div class="search" style="min-width: 180px">
                <input type="search" id="search" placeholder="Наименование/ИНН" wire:model="searchValue">
            </div>
            <div class="search"  style="min-width: 100px">
                <input type="search" id="region_search" placeholder="Регион" wire:model="regionValue">
            </div>
            <div class="filters-right">
                <div class="select-box" wire:ignore>
                    <span>Менеджер:</span>
                    <select name="selected_manager" id="selected_manager">
                        <option value="0">Все</option>
                        @foreach ($managers as $manager)
                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select-box" wire:ignore>
                    <span>Тип клиента:</span>
                    <select name="company_type" id="company_type">
                        <option value="0">Все</option>
                        @foreach ($companyTypes as $companyType)
                            <option value="{{ $companyType->id }}">{{ $companyType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select-box" wire:ignore>
                    <span>Статус:</span>
                    <select name="company_status" id="company_status">
                        <option value="0">Все</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="btn-abc"></div>
                <div class="alfavite">
                    <div class="alfavite-box">
                        @foreach ($letters as $char)
                            <a href="javascript: void(0);"
                                onclick="setSearchValue('{{ $char }}')">{{ $char }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="alfavite-select">
                    <select name="alfavite-sel" id="alfavite-sel">
                        @foreach ($letters as $char)
                            <option value="{{ $char }}">{{ $char }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $("#company_status").on('change', function() {
                Livewire.emit('changeStatusId', $("#company_status").val())
            });
            $("#company_type").on('change', function() {
                Livewire.emit('changeCompanyTypeId', $("#company_type").val())
            });
            $("#selected_manager").on('change', function() {
                Livewire.emit('setSelectedManager', $("#selected_manager").val())
            });

            hideCheckSsnPopup();
        });

        function setSearchValue(value) {
            $("#search").val(value)
            Livewire.emit('changeSearchValue', value)
        }

        function showCheckSsnPopup() {
            document.getElementById("check-ssn-popup").style.visibility='visible';
        }
        function hideCheckSsnPopup() {
            document.getElementById("check-ssn-popup").style.visibility='hidden';
        }
    </script>
</div>

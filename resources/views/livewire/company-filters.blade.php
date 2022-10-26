<div class="content-box__top-line">
    <div class="container">
        <h1>Контрагенты</h1>
        <a href="{{ route('companies.create') }}" class="btn-new-event"><span>Добавить контрагента</span><img
                src="img/plus-blue.svg" alt=""></a>
        <div class="filters">
            <div class="search">
                <input type="search" id="search" placeholder="Поиск" wire:model="searchValue">
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
            $("#selected_manager").on('change', function() {
                Livewire.emit('setSelectedManager', $("#selected_manager").val())
            });
        });

        function setSearchValue(value) {
            $("#search").val(value)
            Livewire.emit('changeSearchValue', value)
        }
    </script>
</div>

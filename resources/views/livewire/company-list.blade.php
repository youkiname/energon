
<div>
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
                    <select name="company_status" id="company_status">
                        <option value="0">Все</option>
                        @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="btn-abc"></div>
                <div class="alfavite">
                    <div class="alfavite-box">
                        @foreach($letters as $char)
                        <a href="#">{{ $char }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="alfavite-select">
                    <select name="alfavite-sel" id="alfavite-sel">
                        @foreach($letters as $char)
                        <option value="{{ $char }}">{{ $char }}</option>
                        @endforeach
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
            @foreach($companies as $company)
                @include('company.table-row', ['company' => $company])
            @endforeach
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $("#company_status").on('change', function() {
            Livewire.emit('changeStatusId', $("#company_status").val())
        });
    });
    
</script>
</div>

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
                <div class="table-th">Менеджер</div>
                <div class="table-th">Статус</div>
            </div>
            @foreach($companies as $company)
                @include('company.components.table-row', ['company' => $company])
            @endforeach
        </div>
    </div>
</div>

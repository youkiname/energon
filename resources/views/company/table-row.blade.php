<div class="table-tr">
    <div class="table-td">
        <b>{{ $company->legal }}</b>
        <span>{{ $company->name }}</span>
    </div>
    <div class="table-td">
        <b>ВО</b>
        <span>{{ $company->city }}</span>
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
        <span>{{ $company->ssn }}</span>
    </div>
    <div class="table-td">
        <b>Тип клиента</b>
        <span>{{ $company->companyType->name }}</span>
    </div>
    <div class="table-td">
        <a href="#" class="table-tr-btn"></a>
        <a href="{{ route('companies.show', ['company' => $company]) }}" class="del">{{ $company->status->name }}</a>
    </div>
</div>
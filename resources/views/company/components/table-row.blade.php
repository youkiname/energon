<div class="table-tr">
    <div class="table-td">
        <b>{{ $company->legal }}</b>
        <a href="{{ route('companies.show', ['company' => $company]) }}">{{ $company->name }}</a>
    </div>
    <div class="table-td">
        <b>Город</b>
        <span>{{ $company->city }}</span>
    </div>
    <div class="table-td">
        <b>{{ $company->employee->position }}</b>
        <span>{{ $company->employee->getFullName() }}</span>
    </div>
    <div class="table-td">
        <b>Рабочий телефон</b>
        <span><a href="tel:{{ $company->employee->phone->phone }}">{{ $company->employee->phone->phone }}</a></span>
    </div>
    <div class="table-td">
        <b>Рабочий e-mail</b>
        <span><a href="mailto:{{ $company->employee->email->email }}">{{ $company->employee->email->email }}</a></span>
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
        <a href="{{ route('companies.show', ['company' => $company]) }}" class="del"
        style="width: auto;">
        {{ $company->status->name }}
        </a>
    </div>
</div>
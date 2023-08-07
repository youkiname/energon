<div class="table-tr">
    <div class="table-td" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;">
        <b>{{ $company->legal }}</b>
        <a href="{{ route('companies.show', ['company' => $company]) }}">{{ $company->name }}</a>
    </div>
    <div class="table-td">
        <b>Регион</b>
        <span>{{ $company->city }}</span>
    </div>
    <div class="table-td">
        <b>{{ $company->employee->position }}</b>
        <span>{{ $company->employee->getFullName() }}</span>
    </div>
    <div class="table-td">
        <b>Телефон</b>
        <span><a href="tel:{{ $company->employee->phone() }}">{{ $company->employee->phone() }}</a></span>
    </div>
    <div class="table-td">
        <b>Рабочий e-mail</b>
        <span><a href="mailto:{{ $company->employee->email() }}">{{ $company->employee->email() }}</a></span>
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
        <b>Ответственный</b>
        @if($company->manager)
        <span>{{ $company->manager->name }}</span>
        @else
        <span>Пусто</span>
        @endif
    </div>
    <div class="table-td">
        <a href="#" class="table-tr-btn"></a>
        <a href="{{ route('companies.show', ['company' => $company]) }}" class="del"
        style="width: auto;">
        {{ $company->status->name }}
        </a>
    </div>
</div>
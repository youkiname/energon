<div class="table-wrap">
    <div class="elem-item-title">
        <span>Привязать компанию</span>
    </div>
    <div class="container">
        <div class="table">
            <div class="table-tr">
                <div class="table-th">Компания</div>
                <div class="table-th">Город</div>
                <div class="table-th">ИНН</div>
                <div class="table-th">тип клиента</div>
                <div class="table-th"></div>
            </div>
            @foreach($companies as $company)
            <div class="table-tr">
                <div class="table-td">
                    <b>{{ $company->legal }}</b>
                    <a href="{{ route('companies.show', ['company' => $company]) }}">{{ $company->name }}</a>
                </div>
                <div class="table-td">
                    <b>ВО</b>
                    <span>{{ $company->city }}</span>
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
                    <form action="{{ route('companies.bundle') }}" method="post" class="form-btns">
                        @csrf
                        <input type="hidden" name="a_company_id" value="{{ $currentCompany->id }}">
                        <input type="hidden" name="b_company_id" value="{{ $company->id }}">
                        <button type="submit" class="btn" 
                        @if($currentCompany->id == $company->id) disabled @endif>Привязать</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="elem-item-box">
    <div class="elem-item-box-title">
        <a href="{{ route('companies.show', ['company' => $company]) }}"
        style="color: black;">
        {{ $company->legal }} {{ $company->name }}
        </a> 
    </div>
    <div class="el-org">
        <span>ИНН</span>
        <b>{{ $company->ssn }}</b>
    </div>
    <div class="el-org">
        <span>Адрес</span>
        <b>{{ $company->address }}</b>
    </div>
    <div class="btn-more-box">
        <a class="btn-more" href="javascrirpt:void(0)">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div class="btn-el-items">
            <a href="#" class="btn-el btn-del"></a>
            <a href="#" class="btn-el btn-edit"></a>
        </div>
    </div>
</div>
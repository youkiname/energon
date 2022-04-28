@foreach($companies as $company)
<div class="elem-item-box
@if(!($mainCompany->isBundleConfirmed($company->id))) bundle-not-confirmed @endif
">
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
    @if(!($mainCompany->isBundleConfirmed($company->id))) 
    <div class="el-org">
        <span>Неподтверждена</span>
    </div>
    @endif

    @if(Auth::user()->isMainManager())
    <div class="btn-more-box">
        <a class="btn-more" href="javascrirpt:void(0)">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div class="btn-el-items">
        <form action="{{ route('bundles.destroy', ['company'=>$company, 'another'=>$mainCompany]) }}"
            method="post" id="bundleDestroy{{ $company->id }}">
            @csrf
            @method('DELETE')
            <a href="javascript:void(0)" class="btn-el btn-del" onclick="document.getElementById('bundleDestroy{{ $company->id }}').submit()"></a>
        </form>
        </div>
    </div>
    @endif()
</div>
@endforeach
<div class="elem-item-list">
    @foreach($employees as $employee)
    <div class="elem-item-box">
        <div class="elem-item-box__top">
            <span>{{ $employee->position }}</span>
            <b>{{ $employee->getFullName() }}</b>
        </div>
        <div class="elem-item-box__bottom">
            <div>
                <span>Номер телефона</span>
                @foreach($employee->phones as $phone)
                <b><a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a></b>
                @endforeach
            </div>
            <div>
                <span>Электронная почта</span>
                @foreach($employee->emails as $email)
                <b><a href="mailto:{{ $email->email }}">{{ $email->email }}</a></b>
                @endforeach
            </div>
        </div>
        @if(Auth::user()->isMainManager())
        <div class="btn-more-box">
            <a class="btn-more" href="javascrirpt:void(0)">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="btn-el-items">
                <form action="{{ route('employee.destroy', ['employee' => $employee]) }}"
                      method="post" id="employeeDelete{{ $employee->id }}">
                    @csrf
                    @method('DELETE')
                    <a href="javascript:void(0)" class="btn-el btn-del" onclick="document.getElementById('employeeDelete{{ $employee->id }}').submit()"></a>
                </form>
                <a href="{{ route('employee.edit', ['employee'=>$employee]) }}" class="btn-el btn-edit"></a>
            </div>
        </div>
        @endif
    </div>
    @endforeach

    <a href="javascript:void(0)" class="add-card" id="add-new-employee-btn"><span>Добавить</span><i></i></a>
</div>
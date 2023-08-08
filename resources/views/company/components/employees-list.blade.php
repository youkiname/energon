<div class="elem-item-list">
    @foreach($employees as $employee)
    <div class="elem-item-box">
        <div class="elem-item-box__top">
            <span>{{ $employee->position }}</span>
            <b>{{ $employee->getFullName() }}</b>
        </div>
        <div class="elem-item-box__bottom">
            <div>
                @foreach($employee->phones as $phone)
                <span>{{ $phone->phoneType->name }}</span>
                <b><a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a></b>
                @endforeach
            </div>
            <div>
                @foreach($employee->emails as $email)
                <span>{{ $email->emailType->name }}</span>
                <b><a href="mailto:{{ $email->email }}">{{ $email->email }}</a></b>
                @endforeach
            </div>
        </div>
        <div class="elem-item-box__bottom">
            @if($employee->is_main)
                <span class="employee-is-main-span">Основной контакт</span>
            @else
            <form action="{{ route('employee.makeMain', ['employee' => $employee]) }}"
            method="post">
                @csrf
                @method('PUT')
                <button class="employee-make-main-button" type="submit">Сделать основным</button>
            </form>
            @endif
        </div>
        <div class="btn-more-box">
            <a class="btn-more" href="javascrirpt:void(0)">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="btn-el-items">
                @if($employee->isUserHasRights('PUT', Auth::user()))
                <form action="{{ route('employee.destroy', ['employee' => $employee]) }}"
                      method="post" id="employeeDelete{{ $employee->id }}">
                    @csrf
                    @method('DELETE')
                    <a href="javascript:void(0)" class="btn-el btn-del" onclick="document.getElementById('employeeDelete{{ $employee->id }}').submit()"></a>
                </form>
                @endif
                @if($employee->isUserHasRights('DELETE', Auth::user()))
                <a href="{{ route('employee.edit', ['employee'=>$employee]) }}" class="btn-el btn-edit"></a>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <a href="javascript:void(0)" class="add-card" id="add-new-employee-btn"><span>Добавить</span><i></i></a>
</div>
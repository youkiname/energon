<div class="content-box__info-item">
    <div class="container">
        <div class="info-item-top">
            <div class="info-item-top__left">
                <div class="info-item-title">
                    <b>{{ $company->name }}</b>
                    <livewire:company-status-select :company="$company"/>
                    <livewire:company-potentiality-select :company="$company"/>

                    
                    <div class="btn-more-box">
                        <a class="btn-more" href="javascrirpt:void(0)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <div class="btn-el-items">
                            @if($company->isUserHasRights('DELETE', Auth::user()))
                            <a href="javascrirpt:void(0)" class="btn-el btn-del" data-toggle="confirmation"
                            onclick="adminConfirm(function() {
                                document.getElementById('companyDelete').submit();
                            }, 'Вы уверены?', 'Все сотрудники, задачи и события, связанные с этой компанией, будут удалены.')"></a>
                            <form action="{{ route('companies.destroy', ['company' => $company]) }}"
                                method="post" id="companyDelete">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endif()

                            @if($company->isUserHasRights('PUT', Auth::user()))
                            <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                            @endif()
                        </div>
                    </div>
                </div>
                <div class="info-item-content">
                    <p>{{ $company->description }}</p>
                </div>
                <div class="info-item-address">
                    <div>
                        <span>ИНН</span>
                        <b>{{ $company->ssn }}</b>
                    </div>
                    <div>
                        <span>Регион</span>
                        <b>{{ $company->city }}</b>
                    </div>
                    <div>
                        <span>Адрес</span>
                        <b>{{ $company->address }}</b>
                    </div>
                </div>
            </div>
            <div class="info-item-top__right">
                <div class="item-info">
                    <span>Тип клиента</span>
                    <b>{{ $company->companyType->name }}</b>
                </div>
                <div class="item-info">
                    <span>Тип закупки</span>
                    <b>{{ $company->purchase->name }}</b>
                </div>
                <div class="item-info">
                    <span>Статус клиента</span>
                    <b>{{ $company->status->name }}</b>
                </div>
                <div class="item-info">
                    <span>Ответственный менеджер </span>
                    @if($company->manager)
                    <b>{{ $company->manager->name }}</b>
                    @else
                    <b>Пусто</b>
                    @endif
                </div>
                @if($company->isUserHasRights('PUT', Auth::user()))
                <div class="btn-more-box">
                    <a class="btn-more" href="javascrirpt:void(0)">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <div class="btn-el-items">
                        <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="elem-line">
            <div class="elem-line__content">
                <div>
                    <span>№ Договора</span>
                    <b>{{ $company->details->contract_number }}</b>
                </div>
                <div>
                    <span>№ Спецификации</span>
                    <b>{{ $company->details->specification_number }}</b>
                </div>
                <div>
                    <span>№ Заявки</span>
                    <b>{{ $company->details->request_number }}</b>
                </div>
                <div>
                    <span>№ Заказа</span>
                    <b>{{ $company->details->order_number }}</b>
                </div>
                <div>
                    <span>Дата заказа</span>
                    <b>{{ $company->details->order_date }}</b>
                </div>
                <div>
                    <span>Сумма заказов</span>
                    <b>{{ $company->details->order_sum }}</b>
                </div>
                <div>
                    <span>% Премии менеджера</span>
                    <b>{{ $company->details->manager_premium }}</b>
                </div>
                <div>
                    <span>Кол-во рабочих часов</span>
                    <b>{{ $company->details->working_hours }}</b>
                </div>
                <div>
                    <span>Тип оборудования</span>
                    <b>{{ $company->details->equipment_type }}</b>
                </div>
                <div>
                    <span>Место доставки\Склад</span>
                    <b>{{ $company->details->delivery_place }}</b>
                </div>
            </div>
            @if($company->isUserHasRights('PUT', Auth::user()))
            <div class="btn-more-box">
                <a class="btn-more" href="javascrirpt:void(0)">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <div class="btn-el-items">
                    <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
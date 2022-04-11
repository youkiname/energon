<div class="content-box__info-item">
    <div class="container">
        <div class="info-item-top">
            <div class="info-item-top__left">
                <div class="info-item-title">
                    <b>{{ $company->name }}</b>
                    <div class="info-item-title-box">
                        <select name="status-select" id="status-select">
                            <option selected disabled value="Статус">Статус</option>
                            @foreach($companyStatuses as $companyStatus)
                                <option value="{{ $companyStatus->id }}">{{ $companyStatus->name }}</option>
                            @endforeach
                        </select>
                        <span class="in-work2">{{ $company->status->name }}</span>
                    </div>

                    <div class="client-status">
                        <div class="select-box">
                            <span>Потенциал клиента:</span>
                            
                            <select name="" id="">
                            @foreach($companyPotentialities as $companyPotentiality)
                                <option value="{{ $companyPotentiality->id }}"
                                @if($companyPotentiality->id == $company->potentiality->id) selected @endif
                                >
                                    {{ $companyPotentiality->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="btn-more-box">
                        <a class="btn-more" href="javascrirpt:void(0)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <div class="btn-el-items">
                            <a href="#" class="btn-el btn-del"></a>
                            <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
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
                        <span>Город</span>
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
                    <b>John Doe</b>
                </div>
                <div class="btn-more-box">
                    <a class="btn-more" href="javascrirpt:void(0)">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <div class="btn-el-items">
                        <a href="#" class="btn-el btn-del"></a>
                        <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                    </div>
                </div>
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
            </div>
            <div class="btn-more-box">
                <a class="btn-more" href="javascrirpt:void(0)">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <div class="btn-el-items">
                    <a href="#" class="btn-el btn-del"></a>
                    <a href="{{ route('companies.edit', ['company'=>$company]) }}" class="btn-el btn-edit"></a>
                </div>
            </div>
        </div>
    </div>
</div>
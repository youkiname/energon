<div class="centered-popup" id="centered-popup" wire:ignore.self>
    <div class="controls">
    <button onclick="hideCompaniesListPopup()" type="button" style="background: none; color:black;">x</button>
    </div>
    <h3>Привязать задачу к контрагенту</h3>
    <div
    style="display: flex; align-items: center; width: 100%;"
    >
        <input type="text" placeholder="Название/ИНН" wire:model="ssnValue" style="margin:0;">
        <button class="btn-blue" type="button" wire:click="refreshCompanies"
        style="max-width:100px; margin-left:10px;"
        >Поиск</button>
    </div>
    

    <div class="table-wrap" style="max-height: 500px; overflow: auto;">
        <div class="container">
            <div class="table">
                <div class="table-tr">
                    <div class="table-th">Компания</div>
                    <div class="table-th">ИНН</div>
                    <div class="table-th">тип клиента</div>
                    <div class="table-th"></div>
                </div>
                @foreach($companies as $company)
                <div class="table-tr">
                    <div class="table-td">
                        <b>{{ $company->legal }}</b>
                        <a href="">{{ $company->name }}</a>
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
                        <button type="button" class="btn-blue" 
                        onclick="onLinkButtonClick({{ $company->id }}, '{{ $company->name }}')">Привязать</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function onLinkButtonClick(companyId, companyName) {
            const companyNameLabel = document.getElementById('linked_сompany_name');
            companyNameLabel.innerHTML = "Контрагент: " + companyName;

            const companyIdInput = document.getElementById('company_id_input');
            companyIdInput.value = companyId;
            
            hideCompaniesListPopup();
        }
    </script>
</div>

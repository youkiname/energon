<div class="personal-form">
    <div class="personal-form__top">
        <b>Сотрудник</b>
    </div>
    <div class="personal-box">
        <div class="contragent-form__item">
            <x-input name="employee_position" labelName="Должность"/>
        </div>
        <div class="contragent-form__item">
            <x-input name="employee_first_name" labelName="Имя"/>
        </div>
        <div class="contragent-form__item">
            <x-input name="employee_last_name" labelName="Фамилия"/>
        </div>
        <div class="contragent-form__item">
            <x-input name="employee_patronymic" labelName="Отчество"/>
        </div>
    </div>

    <div class="personal-phones" id="personal-phones">
        <div class="contragent-form__item">
            <label for="employee_phones">Рабочий телефон</label>
            <input type="tel" name="employee_phones[]" 
            class="@error('employee_phones') is-invalid @enderror">
        </div>
        <div class="contragent-form__item">
            <label for="employee_phones">Рабочий телефон</label>
            <input type="tel" name="employee_phones[]">
            <a href="javascript:void(0)" class="remove"></a>
        </div>
        <a id="add-new-phone-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
    </div>
    
    <div class="personal-mails" id="personal-mails">
        <div class="contragent-form__item">
            <label for="employee_emails">Рабочий e-mail</label>
            <input type="email" name="employee_emails[]" 
            class="@error('employee_emails') is-invalid @enderror">
        </div>
        <a id="add-new-email-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
    </div>
</div>
@include('company.components.contacts-js')

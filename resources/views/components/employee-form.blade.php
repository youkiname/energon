<div class="personal-form">
    <div class="personal-form__top">
        <b>Сотрудник</b>
    </div>
    <div class="personal-box">
        <div class="contragent-form__item">
            <x-input name="employee_position" labelName="Должность" />
        </div>
        <div class="contragent-form__item">
            <x-input name="employee_last_name" labelName="Фамилия" />
        </div>
        <div class="contragent-form__item">
            <x-input name="employee_first_name" labelName="Имя" />
        </div>
        <div class="contragent-form__item">
            <x-input name="employee_patronymic" labelName="Отчество" />
        </div>
    </div>

    <div class="personal-phones" id="personal-phones">
        <x-phone-input-array name="employee_phones"/>

        <a id="add-new-phone-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
    </div>

    <div class="personal-mails" id="personal-mails">
        <x-email-input-array name="employee_emails"/>

        <a id="add-new-email-btn" href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
    </div>
</div>
@include('company.components.contacts-js', ['phoneTypes' => $phoneTypes])

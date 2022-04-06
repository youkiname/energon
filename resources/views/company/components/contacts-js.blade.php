<script>
    document.addEventListener('DOMContentLoaded', function(){
        let addNewPhoneButton = document.getElementById('add-new-phone-btn');
        addNewPhoneButton.onclick = function() {
            $("#personal-phones").append(`
            <div class="contragent-form__item">
                <label for="employee_phones">Рабочий телефон</label>
                <input type="tel" name="employee_phones[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `);
        };
        
        let addNewEmailButton = document.getElementById('add-new-email-btn');
        addNewEmailButton.onclick = function() {
            $("#personal-mails").append(`
            <div class="contragent-form__item">
                <label for="employee_emails[]">Рабочий e-mail</label>
                <input type="email" name="employee_emails[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `);
        };

        $(document).on('click', '.remove', function () {
            $(this).parents('div.contragent-form__item').remove();
        });
    });
</script>
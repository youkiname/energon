<script>
    document.addEventListener('DOMContentLoaded', function(){
        let addNewPhoneButton = document.getElementById('add-new-phone-btn');
        addNewPhoneButton.onclick = function() {
            $(`
            <div class="contragent-form__item">
                <label for="employee_phones">Рабочий телефон</label>
                <input type="tel" name="employee_phones[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `).insertBefore( "#add-new-phone-btn" );
        };
        
        let addNewEmailButton = document.getElementById('add-new-email-btn');
        addNewEmailButton.onclick = function() {
            $(`
            <div class="contragent-form__item">
                <label for="employee_emails[]">Рабочий e-mail</label>
                <input type="email" name="employee_emails[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `).insertBefore( "#add-new-email-btn" );
        };

        $(document).on('click', '.remove', function () {
            $(this).parents('div.contragent-form__item').remove();
        });
    });
</script>
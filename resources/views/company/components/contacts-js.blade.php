<script>
    function applyPhoneMask() {
        $('input[type=tel]').inputmask({
            mask: [
                { 'mask': '+7 \\ \\ ###-###-##-##' }
            ],
            greedy: false,
            definitions: {
                '#': {
                    validator: '[0-9]',
                    cardinality: 1
                }
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function(){
        
        let addNewPhoneButton = document.getElementById('add-new-phone-btn');
        addNewPhoneButton.onclick = function() {
            $(`
            <div class="contragent-form__item">
                <label>Телефон</label>
                <select name="phone_types[]">
                    @foreach($phoneTypes as $phoneType)
                    <option value="{{ $phoneType->id }}">{{ $phoneType->name }}</option>
                    @endforeach
                </select>
                <input type="tel" name="employee_phones[]" class="">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `).insertBefore( "#add-new-phone-btn" );
            applyPhoneMask();
            $('select').niceSelect();
        };
        
        let addNewEmailButton = document.getElementById('add-new-email-btn');
        addNewEmailButton.onclick = function() {
            $(`
            <div class="contragent-form__item">
                <label>Email</label>
                <select name="email_types[]">
                    @foreach($emailTypes as $emailType)
                    <option value="{{ $emailType->id }}">{{ $emailType->name }}</option>
                    @endforeach
                </select>
                <input type="email" name="employee_emails[]">
                <a href="javascript:void(0)" class="remove"></a>
            </div>
            `).insertBefore( "#add-new-email-btn" );
            $('select').niceSelect();
        };

        $(document).on('click', '.remove', function () {
            $(this).parents('div.contragent-form__item').remove();
        });
    });
</script>
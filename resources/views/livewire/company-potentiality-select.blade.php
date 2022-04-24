<div class="client-status">
    <div class="select-box" wire:ignore>
        <span>Потенциал клиента:</span>
        
        <select name="" id="company_potentiality">
        @foreach($potentialities as $potentiality)
            <option value="{{ $potentiality->id }}"
            @if($potentiality->id == $company->potentiality->id) selected @endif
            >
            {{ $potentiality->name }}
            </option>
        @endforeach
        </select>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $("#company_potentiality").on('change', function() {
                Livewire.emit('changeCompanyPotentiality', $("#company_potentiality").val())
            });
        });
    </script>
</div>
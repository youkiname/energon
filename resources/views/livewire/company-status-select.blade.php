<div class="info-item-title-box">
    <div wire:ignore>
    <select name="status-select" id="company_status">
        @foreach($statuses as $status)
            <option value="{{ $status->id }}"
            @if($status->id == $company->status->id) selected @endif
            >{{ $status->name }}</option>
        @endforeach
    </select>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $("#company_status").on('change', function() {
                Livewire.emit('changeCompanyStatus', $("#company_status").val())
            });
        });
    </script>
</div>
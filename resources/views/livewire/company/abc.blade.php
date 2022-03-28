<div x-data="{letter: ''}" x-init="$watch('letter', value => changeLetter(value))">
    <div class="btn-abc"></div>
    <div class="alfavite">
        <div class="alfavite-box">
            @for($i = 1040; $i < 1072; $i++)
            <a href="#" @click.prevent="changeLetter('{{ mb_chr($i, 'UTF-8') }}')">{{ mb_chr($i, 'UTF-8') }}</a>
            @endfor
        </div>
    </div>
    <div class="alfavite-select">
        <select name="alfavite-sel" id="alfavite-sel">
            @for($i = 1040; $i < 1072; $i++)
            <option value="{{ mb_chr($i, 'UTF-8') }}">{{ mb_chr($i, 'UTF-8') }}</option>
            @endfor
        </select>
    </div>
    <script>
        function changeLetter(val) {
            if (val.length > 0) {
                document.getElementById('search').value = 'start:' + val;
                Livewire.emit('searchUpdated', 'start:' + val);
                toggleAbc();
            }
        }
    </script>
</div>

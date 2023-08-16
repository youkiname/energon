@if(is_null(old($name.'.0')))
<div class="contragent-form__item">
    <label>Телефон</label>
    <select name="phone_types[]">
        @foreach($phoneTypes as $phoneType)
        <option value="{{ $phoneType->id }}">{{ $phoneType->name }}</option>
        @endforeach
    </select>
    <input type="tel" name="{{ $name . '[]' }}" 
    class="@error($name.'.0') is-invalid @enderror">
</div>
<div class="contragent-form__item">
    <label>Телефон (доб.)</label>
    <select name="phone_types[]">
        @foreach($phoneTypes as $phoneType)
            <option value="{{ $phoneType->id }}" 
            @if($phoneType->id == 4) selected @endif
            >{{ $phoneType->name }}</option>
        @endforeach
    </select>
    <input type="tel" name="{{ $name . '[]' }}" 
    class="@error($name.'.0') is-invalid @enderror">
</div>
@else
    @foreach(old($name) as $key=>$value)
    <div class="contragent-form__item">
        <label>Телефон</label>
        <select name="phone_types[]">
            @foreach($phoneTypes as $phoneType)
                <option value="{{ $phoneType->id }}" 
                @if(old("phone_types")[$key] == $phoneType->id) selected @endif
                >{{ $phoneType->name }}</option>
            @endforeach
        </select>
        <input type="tel" name="{{ $name . '[]' }}" value="{{ $value }}">
        <a href="javascript:void(0)" class="remove"></a>
        @error($name.'.'.$key)
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    @endforeach
@endif
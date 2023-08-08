@if(is_null(old($name.'.0')))
<div class="contragent-form__item">
    <label>Email</label>
    <select name="email_types[]">
        @foreach($emailTypes as $emailType)
        <option value="{{ $emailType->id }}">{{ $emailType->name }}</option>
        @endforeach
    </select>
    <input type="email" name="{{ $name . '[]' }}" 
    class="@error($name.'.0') is-invalid @enderror">
    @error($name.'.0')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
@else
    @foreach(old($name) as $key=>$value)
    <div class="contragent-form__item">
        <label>Email</label>
        <select name="email_types[]">
            @foreach($emailTypes as $emailType)
            <option value="{{ $emailType->id }}">{{ $emailType->name }}</option>
            @endforeach
        </select>
        <input type="email" name="{{ $name . '[]' }}" value="{{ $value }}">
        <a href="javascript:void(0)" class="remove"></a>
        @error($name.'.'.$key)
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    @endforeach
@endif
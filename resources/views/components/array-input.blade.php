@if(is_null(old($name.'.0')))
<div class="contragent-form__item">
    <label>{{ $labelName }}</label>
    <input type="{{ $type }}" name="{{ $name . '[]' }}" 
    class="@error($name.'.0') is-invalid @enderror">
    @error($name.'.0')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
@else
    @foreach(old($name) as $key=>$value)
    <div class="contragent-form__item">
        <label>{{ $labelName }}</label>
        <input type="{{ $type }}" name="{{ $name . '[]' }}" value="{{ $value }}">
        <a href="javascript:void(0)" class="remove"></a>
        @error($name.'.'.$key)
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    @endforeach
@endif
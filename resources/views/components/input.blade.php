@if($labelName)
<label for="{{ $name }}">{{ $labelName }}</label>
@endif

<input type="{{ $type }}" name="{{ $name }}" 
class="@error($name) is-invalid @enderror {{ $class }}" value="{{ old($name) }}"
@if($required) required @endif
>

@error($name)
<div class="text-danger">{{ $message }}</div>
@enderror
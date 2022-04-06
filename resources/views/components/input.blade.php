@if($labelName)
<label for="{{ $name }}">{{ $labelName }}</label>
@endif

<input type="{{ $type }}" name="{{ $name }}" 
class="@error($name) is-invalid @enderror" value="{{ old($name) }}">

@error($name)
<div class="text-danger">{{ $message }}</div>
@enderror
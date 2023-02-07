<select name="{{ $name }}" id="{{ $name }}">
@foreach($items as $item)
    <option value="{{ $item->id }}"
    @if(old($name))
        @if(old($name) == $item->id) selected @endif
    @else
        @if($item->id == $default) selected @endif
    @endif
    >{{ $item->name }}</option>
@endforeach
</select>
@if ($paginator->hasPages())
    <div class="notice-pagination">
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a href="javascript:void(0)" class="active">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    </div>
@endif

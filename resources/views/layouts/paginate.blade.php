@if ($paginator->hasPages())
<div class="pagination">
    @if (!$paginator->onFirstPage())
        <a class="prev page-numbers" href="{{$paginator->previousPageUrl() }}" rel="prev" aria-label="&laquo; Previous">« Previous</a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
                <span aria-disabled="true" class="disabled">...</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="page-numbers current">{{ $page }}</span>
                @else
                        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
            <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next"
               aria-label="Next &raquo;">Next »</a>
    @endif
</div>
@endif

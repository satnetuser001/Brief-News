<nav role="navigation" class="pagination">
    @if ($paginator->hasPages())
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="paginationElement paginationElementPressed">&laquo; назад</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="paginationElement">&laquo; назад</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="paginationElement">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="paginationElement paginationElementPressed">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="paginationElement">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="paginationElement">вперед &raquo;</a>
        @else
            <span class="paginationElement paginationElementPressed" >вперед &raquo;</span>
        @endif
    @endif
</nav>
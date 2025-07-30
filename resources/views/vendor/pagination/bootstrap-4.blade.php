@if ($paginator->hasPages())
    <nav>
        <ul class="pagination align-items-center">

            {{-- First Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">First</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}">First</a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif

            {{-- Search Input Before Last --}}
            <li class="page-item">
                <form method="GET" action="{{ url()->current() }}" class="d-flex ms-2" style="display: inline-flex;">
                    <input type="number" name="page" min="1" max="{{ $paginator->lastPage() }}" class="form-control form-control-sm" placeholder="PageNo" style="width: 80px;">
                    <button type="submit" class="btn btn-sm btn-primary ms-1">Go</button>
                </form>
            </li>

            {{-- Last Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">Last</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">Last</span></li>
            @endif

        </ul>
    </nav>
@endif

@if ($paginator->hasPages())
    <ul class="pagination">
        <li class="page-item disabled">
            @if($paginator->previousPageUrl())
                <a class="page-link" href="{{$paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            @endif
        </li>
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        <li class="page-item">
            @if($paginator->nextPageUrl())
                <a class="page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            @endif
        </li>
    </ul>
@endif


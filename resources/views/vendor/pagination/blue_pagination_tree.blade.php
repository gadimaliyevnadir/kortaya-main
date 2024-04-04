@if ($paginator->hasPages())
<div class="row mb-2 mb-lg-0">
    <div class="col" data-aos="fade-up" data-aos-delay="300">
        <nav class="mt-8 pt-8 border-top d-flex justify-content-center">
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
        </nav>
    </div>
</div>
@endif


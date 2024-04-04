@if ($paginator->hasPages())
    <div class="shop_toolbar_wrapper mt-10">
        <div class="shop-top-bar-left">
            <div class="shop-short-by mr-4">
                <form action="{{ route('frontend.searchPage') }}" method="get">
                    <select class="nice-select rounded-0" aria-label=".form-select-sm example"
                            onchange="this.form.submit()" name="per_page">
                        <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>Show 12 Per Page
                        </option>
                        <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>Show 24 Per Page</option>
                        <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>Show 15 Per Page</option>
                        <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>Show 30 Per Page</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="shop-top-bar-right">
            <nav>
                <ul class="pagination">
                    @if($paginator->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                    @endif


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


                    @if($paginator->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">&raquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endif

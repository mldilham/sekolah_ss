@if ($paginator->hasPages())
<nav>
    <ul class="pagination justify-content-center flex-wrap">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled m-1">
                <span class="page-link">Sebelumnya</span>
            </li>
        @else
            <li class="page-item m-1">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">Sebelumnya</a>
            </li>
        @endif

        {{-- Nomor halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled m-1">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item m-1">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item m-1">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li class="page-item m-1">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Berikutnya</a>
            </li>
        @else
            <li class="page-item disabled m-1">
                <span class="page-link">Berikutnya</span>
            </li>
        @endif
    </ul>
</nav>
@endif

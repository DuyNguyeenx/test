@if ($paginator->hasPages())

    @php
        // Số trang hiển thị cùng lúc
        $pageLimit = 3;

        // Lấy ra tổng số trang
        $totalPages = $paginator->lastPage();

        // Lấy ra trang hiện tại
        $currentPage = $paginator->currentPage();

        // Tính start, end page
        $startPage = $currentPage;
        $endPage = min($totalPages, $currentPage +2);

        // Render phân trang

    @endphp
    @if ($currentPage > 1)
        <a href="{{ $paginator->url($currentPage - $pageLimit) }}"><<</a>
    @endif

    @for ($i = $startPage ; $i <= $endPage; $i++)
        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
    @endfor


    @if ($currentPage+1 < $totalPages)
        <a href="{{ $paginator->url($currentPage + $pageLimit) }}">>></a>
    @endif
@endif

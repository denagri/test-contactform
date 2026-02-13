{{--データが複数ページになる場合のみページネーションのHTMLを表示する--}}
@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- 前のページに戻るボタン＜の表示 --}}
          {{--もし1ページ目ならボタンの非活性化--}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </li>
          {{--1ページ目じゃないなら前のページのURLにとぶ--}}
        @else
        <li>
            <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
        @endif

        {{-- ページネーションのリンクを順に表示する中で --}}
        @foreach ($elements as $element)
        {{-- もし…が作成されたら押せないように表示して --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif
        {{-- 現在表示しているページをハイライトにする --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
        {{--各ページ番号タグを含んだリストを作成する--}}
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- 次のページへ行くボタン＞の非活性化 --}}
          {{--次のページがあるなら＞ボタンが使用できる--}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
          {{--最終のページにいるときに次へボタンの操作は無効にする--}}
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif
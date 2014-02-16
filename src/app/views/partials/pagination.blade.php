@if ($paginator->getLastPage() > 1)
<ul class="pagination pagination-sm pull-right">
    <li class="item{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->getUrl($paginator->getCurrentPage()-1) }}">
            <i class="icon left arrow"></i> {{ trans('pagination.previous') }}
        </a>
    </li>
    @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
    <li class="item{{ ($paginator->getCurrentPage() == $i) ? ' active' : '' }}">
        <a href="{{ $paginator->getUrl($i) }}">
            {{ $i }}
        </a>
    </li>
    @endfor
    <li class="item{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}">
            {{ trans('pagination.next') }} <i class="icon right arrow"></i>
        </a>
    </li>
</ul>
@endif
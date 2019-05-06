<?php
// config
$linkLimit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
$search = empty($dataSearch) ? '' : '&search=' . $dataSearch;
?>

<div class="box paginator-user">
    <div class="col-md-6 col-lg-6 text-left">
        <div class="">
            {{__('messages.Showing')}} {{($paginator->currentPage()-1) * $paginator->perPage()+1}}
            {{__('messages.to')}} {{($paginator->currentPage()-1) * $paginator->perPage()+$paginator->count()}} {{__('messages.of')}} {{$paginator->total()}}
            {{__('messages.entries')}}
        </div>
    </div>
    <div class="col-md-6 col-lg-6 text-right">
        @if ($paginator->lastPage() > 1)
            <ul class="pagination pagination-sm">
                <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                    <a href="{{ ($paginator->currentPage() == 1)?'javascript:void(0)':$paginator->url(1).'&limit='.$paginator->perPage().$search }}">&laquo;</a>
                </li>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <?php
                    $halfTotalLinks = floor($linkLimit / 2);
                    $from = $paginator->currentPage() - $halfTotalLinks;
                    $to = $paginator->currentPage() + $halfTotalLinks;
                    if ($paginator->currentPage() < $halfTotalLinks) {
                        $to += $halfTotalLinks - $paginator->currentPage();
                    }
                    if ($paginator->lastPage() - $paginator->currentPage() < $halfTotalLinks) {
                        $from -= $halfTotalLinks - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                    }
                    ?>
                    @if ($from < $i && $i < $to)
                        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ ($paginator->currentPage() == $i)?'javascript:void(0)':$paginator->url($i).'&limit='.$paginator->perPage().$search }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                    <a href="{{ ($paginator->currentPage() == $paginator->lastPage())?'javascript:void(0)':$paginator->url($paginator->lastPage()).'&limit='.$paginator->perPage().$search }}">&raquo;</a>
                </li>
            </ul>
        @endif
    </div>
    <div class="clearfix"></div>
</div>
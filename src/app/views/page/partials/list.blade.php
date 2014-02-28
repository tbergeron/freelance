<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ trans('page.name') }}</th>
            <th style="width: 35%;">{{ trans('page.last_update') }}</th>
            @if(isset($show_actions))
            <th style="width: 20%;">{{ trans('page.actions') }}</th>
            @endif
        </tr>

        @foreach ($pages as $page)

        <tr>
            <td>{{ Html::linkAction('PageController@getShow', $page->name, ['id' => $page->id]) }}</td>
            <td>{{ $page->updated_at->diffForHumans() }}</td>
            @if(isset($show_actions))
            <td style="text-align: center">
                <a href="{{ URL::action('PageController@getEdit', ['id' => $page->id]) }}" title="{{ trans('page.edit') }}" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('PageController@getDestroy', $page->id) }}" title="{{ trans('page.edit') }}" class="btn btn-default btn-sm" onclick="return confirm('{{ trans('page.destroy_question', ['name' => $page->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
            @endif
        </tr>

        @endforeach
    </table>
</div>
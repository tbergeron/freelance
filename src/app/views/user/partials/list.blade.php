<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ trans('user.full_name') }}</th>
            <th>{{ trans('user.is_admin') }}</th>
            <th>{{ trans('user.email') }}</th>
            <th style="width: 12%;">{{ trans('user.created_at') }}</th>
            @if(isset($show_actions))
            <th style="width: 20%;">{{ trans('user.actions') }}</th>
            @endif
        </tr>

        @foreach ($users as $user)

        <tr>
            <td>{{ Html::linkAction('UserController@getShow', $user->full_name, ['id' => $user->id]) }}</td>
            <td>@if($user->is_admin)X@endif</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            @if(isset($show_actions))
            <td style="text-align: center">
                <a href="{{ URL::action('UserController@getEdit', ['id' => $user->id]) }}" title="{{ trans('user.edit') }}" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('UserController@getDestroy', $user->id) }}" title="{{ trans('user.edit') }}" class="btn btn-default btn-sm" onclick="return confirm('{{ trans('user.destroy_question', ['name' => $user->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
            @endif
        </tr>

        @endforeach
    </table>
</div>
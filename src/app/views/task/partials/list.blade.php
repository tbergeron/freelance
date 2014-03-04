<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th style="width:20px">{{ trans('task.code') }}</th>
            <th style="width: 20px;">{{ trans('task.starred') }}</th>
            <th>{{ trans('task.name') }}</th>
            @if(isset($show_states))
            <th style="width: 10%">{{ trans('task.status') }}</th>
            @endif
            <th style="width:14%">{{ trans('task.assignee') }}</th>
            <th style="width: 12%">{{ trans('task.last_update') }}</th>
            @if(isset($show_actions))
            <th style="width: 15%;">{{ trans('task.actions') }}</th>
            @endif
        </tr>

        @foreach ($tasks as $task)

        <tr>
            <td>{{ $task->codeWithLink() }}</td>
            <td style="text-align: center;">
                @include('task.partials.starred_task')
            </td>
            <td>{{ Html::linkRoute('task_code', $task->name_short(60), ['code' => $task->code()]) }}</td>
            @if(isset($show_states))
            <td>@include('task.partials.state')</td>
            @endif
            <td>@include('user.partials.profile_link', ['user' => $task->user])</td>
            <td>{{ $task->updated_at->diffForHumans() }}</td>
            @if(isset($show_actions))
            <td style="text-align: center">
                @include('task.partials.close_toggle_link', ['small_buttons' => true])

                <a href="{{ URL::action('TaskController@getEdit', ['id' => $task->id]) }}" title="{{ trans('task.edit') }}" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('TaskController@getDestroy', $task->id) }}" title="{{ trans('task.destroy') }}" class="btn btn-default btn-sm" onclick="return confirm('{{ trans('task.destroy_question', ['name' => $task->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
            @endif
        </tr>

        @endforeach

        @unless(count($tasks))
        <tr>
            <td colspan="6">{{ trans('task.no_records') }}</td>
        </tr>
        @endunless

    </table>
</div>
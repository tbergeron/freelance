<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th style="width:10%">{{ trans('task.code') }}</th>
            <th>{{ trans('task.name') }}</th>
            @if(isset($show_states))
            <th style="width: 10%;">{{ trans('task.status') }}</th>
            @endif
            <th style="width:14%">{{ trans('task.assignee') }}</th>
            <th style="width: 10%;">{{ trans('task.last_update') }}</th>
            @if(isset($show_actions))
            <th style="width: 19%;">{{ trans('task.actions') }}</th>
            @endif
        </tr>

        @foreach ($tasks as $task)

        <tr>
            <td>{{ $task->codeWithLink() }}</td>
            <td>{{ Html::linkAction('TaskController@getShow', $task->name, ['id' => $task->id]) }}</td>
            @if(isset($show_states))
            <td>@include('task.partials.state')</td>
            @endif
            <td>@if($task->user) {{ $task->user->full_name }} @endif</td>
            <td>{{ $task->updated_at->diffForHumans() }}</td>
            @if(isset($show_actions))
            <td style="text-align: center">
                @include('task.partials.close_toggle_link', ['small_buttons' => true])
                {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id], ['class' => 'btn btn-default btn-sm']) }}
                <a href="{{ URL::action('TaskController@getDestroy', $task->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('task.destroy_question', ['name' => $task->name]) }}')">
                    {{ trans('task.destroy') }}
                </a>
            </td>
            @endif
        </tr>

        @endforeach

        @unless(count($tasks))
        <tr>
            <td colspan="3">{{ trans('task.no_records') }}</td>
        </tr>
        @endunless

    </table>
</div>
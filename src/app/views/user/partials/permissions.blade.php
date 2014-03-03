<hr/>

<h3>{{ trans('user.permissions') }}</h3>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>{{ trans('user.project') }}</th>
            <th style="width: 25%">{{ trans('user.read') }}</th>
            <th style="width: 25%">{{ trans('user.write') }}</th>
        </tr>
        @foreach($projects as $project)
        <tr>
            <td>{{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}</td>
            <td>
                <input name="permissions[{{ $project->id }}][read]" type="checkbox"
                @if(isset($edit))
                @if(Permission::isChecked($permissions, $project, 'read'))checked="checked"@endif
                @endif
                >
            </td>
            <td>
                <input name="permissions[{{ $project->id }}][write]" type="checkbox"
                @if(isset($edit))
                @if(Permission::isChecked($permissions, $project, 'write'))checked="checked"@endif
                @endif
                >
            </td>
        </tr>
        @endforeach
    </table>
</div>
<br/>
<small>{{ trans('user.read_notice') }}</small>
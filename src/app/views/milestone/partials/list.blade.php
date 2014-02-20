<table class="table table-hover table-striped">
    <tr>
        <th>Name</th>
        <th>Due</th>
        <th>Created</th>
    </tr>

    @foreach ($milestones as $milestone)

    <tr>
        <td>{{ Html::linkAction('MilestoneController@getShow', $milestone->name, ['id' => $milestone->id]) }}</td>
        <td>{{ $milestone->due_date->diffForHumans() }}</td>
        <td>{{ $milestone->created_at->diffForHumans() }}</td>
    </tr>

    @endforeach
</table>
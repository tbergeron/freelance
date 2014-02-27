<div class="row">
    @foreach ($projects as $project)
    <div class="col-md-4 project-grid-element">
        <div class="content">
            <div class="col-md-2 content-icon">
                <i class="glyphicon glyphicon-info-sign"></i>
            </div>
            <div class="col-md-10 content-text no-horizontal-padding">
                <div class="name">
                    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
                    <div class="code">(<span>{{ $project->code }}</span>)</div>
                </div>
                <div class="info">
                    <a href="{{ URL::action('TaskController@getProject', ['id' => $project->id]) }}" class="thing">
                        <span>{{ count($project->tasks) }}</span> opened tasks
                    </a>
                    <a href="{{ URL::action('MilestoneController@getIndex', ['id' => $project->id]) }}" class="thing">
                        <span>{{ count($project->milestones) }}</span> milestones
                    </a>
                    <a href="{{ URL::action('PageController@getIndex', ['id' => $project->id]) }}" class="thing">
                        <span>{{ count($project->pages) }}</span> pages
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
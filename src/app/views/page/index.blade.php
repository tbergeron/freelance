@extends('layouts.master')

@section('title')
{{ trans('page.index') }} -
@stop

@section('content')

<div class="row">
    <div class="col-lg-10">
        <h2 class="section-heading">
            @if(isset($project))
            {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
            @include('partials.heading_separator')
            {{ trans('page.pages') }}
            @else
            {{ trans('page.heading') }}
            @endif
            <div class="pull-right">
                {{ Html::linkAction('PageController@getCreate', trans('page.create'), ((isset($project)) ? ['project_id' => $project->id] : null), ['class' => 'btn btn-default']) }}
            </div>
        </h2>

        <div class="row">
            @foreach ($pages as $page)
            <div class="col-md-4 page-grid-element" data-id="{{ $page->id }}">
                <div>
                    <div class="col-xs-12 col-md-12 no-horizontal-padding content">
                        <div class="name">
                            <h4>
                                {{ Html::linkAction('PageController@getShow', $page->name_short(30), ['id' => $page->id]) }}
                            </h4>
                        </div>
                        <div class="info">
                            {{ Markdown::render(Str::limit($page->content, 200)) }}
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div> <!-- /col-lg-10 -->
    <div class="col-lg-2">
        @include('project.partials.sidebar')
    </div>
</div>

@stop

@section('scripts')
<script>
    $(function(){
        var url = '{{ URL::action('PageController@getShow') }}';
        $('.page-grid-element').click(function(){
            document.location.href = url + '/' + $(this).data('id');
            return false;
        });
    })
</script>
@stop
@extends('layouts.master')

@section('title')
{{ trans('page.index') }} -
@stop

@section('content')

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

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ trans('page.name') }}</th>
            <th style="width: 20%;">{{ trans('page.project_id') }}</th>
            <th style="width: 12%;">{{ trans('page.last_update') }}</th>
            <th style="width: 20%;">{{ trans('page.actions') }}</th>
        </tr>

        @foreach ($pages as $page)

        <tr>
            <td>{{ Html::linkAction('PageController@getShow', $page->name, ['id' => $page->id]) }}</td>
            <td>{{ $page->project }}</td>
            <td>{{ $page->updated_at->diffForHumans() }}</td>
            <td style="text-align: center">
                <a href="{{ URL::action('PageController@getEdit', ['id' => $page->id]) }}" title="{{ trans('page.edit') }}" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('PageController@getDestroy', $page->id) }}" title="{{ trans('page.edit') }}" class="btn btn-default btn-sm" onclick="return confirm('{{ trans('page.destroy_question', ['name' => $page->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
        </tr>

        @endforeach
    </table>
</div>

@stop
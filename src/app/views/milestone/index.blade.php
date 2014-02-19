@extends('layouts.master')

@section('title')
    {{ trans('milestone.index') }} -
@stop

@section('content')

@include('partials.project')
<h2>{{ trans('milestone.heading') }}</h2>

<div>
    {{ Html::linkAction('MilestoneController@getCreate', trans('milestone.create'), ['project_id' => $project->id]) }}
</div>

<br/>

@include('partials.messages')

<ul>
    @foreach ($milestones as $milestone)

    <li>
        {{ Html::linkAction('MilestoneController@getShow', $milestone->name, ['id' => $milestone->id]) }}
        -
        {{ Html::linkAction('MilestoneController@getEdit', trans('milestone.edit'), ['id' => $milestone->id]) }}
         -
        <a href="{{ URL::action('MilestoneController@getDestroy', $milestone->id) }}" onclick="return confirm('{{ trans('milestone.destroy_question', ['name' => $milestone->name]) }}')">
            {{ trans('milestone.destroy') }}
        </a>
    </li>

    @endforeach
</ul>

@stop
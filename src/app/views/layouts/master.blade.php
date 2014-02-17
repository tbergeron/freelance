<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title')
        {{ Config::get('app.name') }}
    </title>
</head>
<body>

<div class="page-header">
    <h1>{{ Config::get('app.name') }}</h1>
</div>

<div>
    <ul>
        <li>{{ Html::linkAction('UserController@getDashboard', trans('app.dashboard')) }}</li>

        @if(Auth::check())
        <li>{{ Html::linkAction('ProjectController@getIndex', trans('project.index')) }}</li>
        <li>{{ Html::linkAction('UserController@getLogout', trans('app.logout')) }}</li>
        @endif
    </ul>
</div>

<div>
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery.js"></script>
@yield('scripts')

</body>
</html>
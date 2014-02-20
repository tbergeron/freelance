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

    {{ HTML::style('css/bootstrap.theme.min.css') }}
    {{ HTML::style('css/main.css')}}
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::action('UserController@getDashboard') }}">{{ Config::get('app.name') }}</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if(Auth::check())

                <ul class="nav navbar-nav">
                    {{ HTML::menu_active('UserController@getDashboard', trans('app.dashboard')) }}

                    @if(Auth::check())
                        {{ HTML::menu_active('ProjectController@getIndex', trans('project.index')) }}
                        {{ HTML::menu_active('TaskController@getIndex', trans('task.index')) }}
                        {{ HTML::menu_active('UserController@getLogout', trans('app.logout'), true) }}
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('app.logged_as') }} <strong>{{ Auth::user()->full_name }}</strong> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::action('UserController@getLogout') }}">{{ trans('app.logout') }}</a></li>
                        </ul>
                    </li>
                </ul>

                @endif
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="container">
    @yield('content')

    <div class="clearfix"></div>
    <div class="footer">
        <hr>
        <div class="row-fluid">
            <div class="col-md-8 col-xs-6">
            </div>
            <div class="col-md-4 col-xs-6">
                <p class="muted pull-right">{{ trans('app.built_by', ['year' => date('Y')]) }}</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery.js"></script>
{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('js/main.js') }}

@yield('scripts')
</body>
</html>
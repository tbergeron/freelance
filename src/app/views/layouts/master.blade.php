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

Tabarnak aweye donc!
<br/>
Contenu:
<div>
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery.js"></script>
@yield('scripts')

</body>
</html>
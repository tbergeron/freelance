@if(Session::has('message'))
    <div class="bs-callout bs-callout-{{ Session::get('type') }}">
        <h4>{{ trans('app.message_' . Session::get('type')) }}</h4>
        <p>{{ Session::get('message') }}</p>
    </div>
@endif
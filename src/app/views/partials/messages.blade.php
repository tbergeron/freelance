@if(Session::has('message'))
    <div class="alert alert-dismissable alert-{{ Session::get('type') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p>
            {{ Session::get('message') }}
        </p>
    </div>
@endif
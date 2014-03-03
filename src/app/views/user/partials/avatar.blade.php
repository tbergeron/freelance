@if(isset($link))
<a href="{{ URL::action('UserController@getShow', ['id' => $user->id]) }}">
@endif
<img class="img-circle" src="{{ Gravatar::src($user->email) }}" />
@if(isset($link))
</a>
@endif
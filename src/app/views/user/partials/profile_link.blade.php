@if($user)
{{ Html::linkAction('UserController@getShow', $user->full_name, ['id' => $user->id]) }}
@endif
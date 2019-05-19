@component('mail::message')
@component('mail::panel')
<p>You registered successfully</p> 
<p>Your username is {{$username}}</p>
<p>Your password is {{$password}}</p>
@endcomponent
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

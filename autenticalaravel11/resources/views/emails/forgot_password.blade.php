@component('mail::message')

Hola, {{ $user->name }}.Forget Password?

<p> It Happenes. </p>
    
@component('mail::button',['url'=> url('reset/'.$user->remember_token)])
    Reset your password
@endcomponent
    Gracias, <br>
    {{ config('app.name')}}
@endcomponent
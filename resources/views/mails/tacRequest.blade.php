@component('mail::message')
# Hello, {{ $user->name }}.

We received a request for password reset. The following is the TAC number for your request.

@component('mail::panel')
<div style="text-align:center;">
    <b style="font-size: 2em">{{ $user->tac }}</b>
</div>
@endcomponent

Please ignore this email if you did not make the request.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

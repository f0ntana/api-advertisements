@component('mail::message')
# Olá {{ $user->name }}

Sua inscrição esta completa.

Obrigado,<br>
{{ config('app.name') }}
@endcomponent

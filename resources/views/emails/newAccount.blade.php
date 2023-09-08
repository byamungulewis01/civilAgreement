@component('mail::message')
# Welcome to {{ config('app.name') }}

Your new CIA account have been created, credential are:

Email: {{ $email }} <br>
Password: {{ $password }}

{{ config('app.name') }}
@endcomponent

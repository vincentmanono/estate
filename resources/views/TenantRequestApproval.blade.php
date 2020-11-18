@component('mail::message')
@component('mail::panel')

@if ($service->status)
    Your Request has been Approved
@else
Your Request has been Rejected
@endif

@endcomponent
@component('mail::panel')
    {{ $service->message }}
@endcomponent

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ auth()->user()->name }}<br>
{{  auth()->user()->type }}<br>
{{ config('app.name') }}
@endcomponent

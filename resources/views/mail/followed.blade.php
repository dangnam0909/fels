@component('mail::message')
**@lang('profile.dear') {{ $full_name }}：**

{{ $messages }}

@component('mail::button', ['url' => $url])
@lang('profile.view')
@endcomponent
@lang('messages.thanks'), <br>
{{ config('app.name') }}
@endcomponent

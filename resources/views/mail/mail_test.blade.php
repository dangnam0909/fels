@component('mail::message')
**{{ $test_name }}**
<br>
@lang('profile.dear') {{ $full_name }},

@lang('messages.suggest_test')

@component('mail::button', ['url' => $url])
@lang('test.make_test')
@endcomponent
@lang('messages.thanks'), <br>
{{ config('app.name') }}
@endcomponent

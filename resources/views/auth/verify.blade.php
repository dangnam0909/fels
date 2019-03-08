@extends('layouts.app')

@section('title', __('messages.login'))

@section('content')
<div class="login-box card">
    <div class="card-body">
        <div class="card-title">@lang('messages.verify_email')</div>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                @lang('messages.verify_link')
            </div>
        @endif

        @lang('messages.before_proceeding')
        @lang('receive_email'), <a href="{{ route('verification.resend') }}">@lang('messages.click_here')</a>.
    </div>
</div>
@endsection


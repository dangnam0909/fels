@extends('layouts.home.master')
@section('title', __('messages.free_english'))

@section('content')
    <h2 class="h2 text-center">@lang('topic.free_english')</h2>
    <p class="text-center">@lang('topic.free_text')</p>

    @include('widgets.topic')
@endsection

@extends('layouts.home.master')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body bg-danger">
                <h4 class="text-white card-title">@lang('profile.list_results') ( {{ $results->count() }} )</h4>
            </div>
            <div class="card-body">
                <div class="message-box contact-box">
                    <div class="message-widget contact-widget">
                        @forelse ($results as $result)
                            <a href="{{ route('tests.show', $result->test_id) }}">
                                <div class="user-img">
                                    <span class="profile-status online pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h3>@lang('profile.test_name'): {{ $result->test->test_name }}</h3>
                                    <h5>@lang('profile.time'): {{ $result->finish_time }}</h5>
                                    <span class="mail-desc">@lang('profile.score'): {{ $result->score }}</span>
                                </div>
                                <button class="btn btn-primary">@lang('test.test_again')</button>
                            </a>

                        @empty
                            <h2 class="text-center">@lang('messages.nothing')</h2>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

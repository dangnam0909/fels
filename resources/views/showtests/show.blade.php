@extends('layouts.home.master')

@section('content')
    <h2 class="h2 text-center">@lang('messages.show_tests')</h2>
    <div class="infinite-scroll">
        @forelse($tests as $id => $test)
            <div class="ribbon ribbon-bookmark  ribbon-default">#{{ ($id + 1) }} </div>
                <div class="ribbon-wrapper card">
                    <div class="comment-widgets">
                        <div class="comment-text w-100"> 
                            <p>
                                <span>@lang('messages.sp_test_name'): &nbsp;</span><span>{{ $test->test_name }}</span></br>
                                <span>@lang('messages.sp_time_test'): &nbsp;</span><span>{{ $test->time }}</span>
                            </p>
                            <div class="comment-footer">
                                <span class="action-icons">
                                    <a href="javascript:void(0)"><i data-toggle="tooltip" data-original-title="{{ trans('messages.results') }}" class="ti-check"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
        @empty
            <h2 class="text-center">@lang('messages.nothing')</h2>
        @endforelse
    </div>
@endsection

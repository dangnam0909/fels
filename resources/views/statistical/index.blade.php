@extends('layouts.home.master')

@section('content')
<h1>@lang('messages.statis')</h1>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="message-box contact-box">
                    <div class="message-widget contact-widget">
                        <p>@lang('messages.sum_word_in_month')<strong>{{ $sum_month }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{ Html::script(asset('/js/statisHandle.js'))}}
@endsection

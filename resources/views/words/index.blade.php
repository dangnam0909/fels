@extends('layouts.home.master')
@section('title')
    @lang('messages.word_title')
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@include('common.errors')

<div class="row">
    @forelse($word as $w)
        <div class="col-md-6 col-lg-6 col-xlg-4">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4 col-lg-3 text-center">
                        <a href="#">
                            {{ Html::image('uploads/words/images/' . $w->picture, $w->word_name, ['class' => 'img-circle img-responsive']) }}

                        </a>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <h3 class="box-title m-b-0">{{ $w->word_name }}</h3> <small>{{ trans('word.web_design') }}</small>
                        <address>
                            {{ $w->translate }}
                            <br>
                            <br>
                            <audio controls>
                                <source src="{{ $w->sound }}" type="audio/mpeg"/>
                            </audio>
                            <h3>
                                <a id="favorite-form" href="{{ route('wordlist.add', $w->id) }}" data-id="{{ $w->id }}" class="badge badge-{{ $w->hasMemories($w->id) ? 'danger' : 'info' }}">{{ $w->hasMemories($w->id) ? 'Memoried' : 'Add Favorite' }}</a>
                            </h3>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2 class="text-center">@lang('messages.nothing')</h2>
    @endforelse
</div>
@endsection

@section('scripts')
    {{ Html::script(asset('/js/word.js'))}}
@endsection

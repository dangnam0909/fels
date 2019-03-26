@extends('layouts.home.master')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body bg-danger">
                <h4 class="text-white card-title">@lang('profile.list_user_follower') ( {{ $followers->count() }} )</h4>
            </div>
            <div class="card-body">
                <div class="message-box contact-box">
                    <div class="message-widget contact-widget">
                        @forelse ($followers as $follower)
                            <a href="{{ route('profile.show', $follower->id) }}">
                                <div class="user-img">
                                    {{ Html::image('/uploads/users/' . $follower->avatar, $follower->full_name, ['class' => 'img-circle']) }}
                                    <span class="profile-status online pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>{{ $follower->full_name }}</h5> <span class="mail-desc">{{ $follower->email }}</span>
                                </div>
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

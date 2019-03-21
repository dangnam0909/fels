@extends('layouts.home.master')

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            {{ Html::image('assets/admin/images/backgrounds/dashboard.jpg', $user->full_name) }}

            <div class="card-body little-profile text-center">
                <div class="pro-img">
                    {{ Html::image('/uploads/users/' . $user->avatar, $user->full_name) }}

                </div>
                <h3 class="m-b-0">{{ $user->full_name }}</h3>
                <p>{{ $user->gender }}</p>
                <p><small>{{ $user->email }}</small></p> <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">@lang('profile.follow')</a>
                <div class="row text-center m-t-20">
                    <div class="col-lg-6 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light"></h3><small>@lang('profile.followers')</small>
                    </div>
                    <div class="col-lg-6 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light"></h3><small>@lang('profile.following')</small></div>
                    <div class="col-md-12 m-b-10"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">@lang('profile.setting')</a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                        {!! Form::open(['route' => ['profile.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal form-material']) !!}

                            <div class="form-group">
                                {!! Form::label('full_name', trans('profile.full_name', ['class' => 'col-md-12'])) !!}

                                <div class="col-md-12">
                                    {!! Form::text('name', $user->full_name, ['class' => 'form-control form-control-line']) !!}

                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', trans('profile.email', ['class' => 'col-md-12'])) !!}

                                <div class="col-md-12">
                                    {!! Form::text('email', $user->email, ['class' => 'form-control form-control-line']) !!}

                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('gender', trans('profile.gender', ['class' => 'col-md-12'])) !!}

                                <div class="col-md-12">
                                    {!! Form::radio('gender', config('setting.male'), $user->gender == trans('profile.male'), ['id' => config('setting.male')]) !!}
                                    {!! Form::label(config('setting.male'), trans('profile.male')) !!}

                                    {!! Form::radio('gender', config('setting.female'), $user->gender == trans('profile.female'), ['id' => config('setting.female')]) !!}
                                    {!! Form::label(config('setting.female'), trans('profile.female')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('date_of_birthday', trans('profile.date_of_birthday', ['class' => 'col-2 col-form-label'])) !!}

                                <div class="col-12">
                                    {!! Form::date('date_of_birthday', $user->date_of_birthday, ['class' => 'form-control form-control-line']) !!}

                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::submit(trans('profile.update_profile'), ['class'=>'btn btn-success'])}}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', __('messages.register'))

@section('content')
<div class="login-box card">
    <div class="card-body">

        {!! Form::open(['route' => 'register', 'method' => 'POST', 'class' => 'form-horizontal form-material', 'id' => 'loginform']) !!}

            <a href="javascript:void(0)" class="text-center db">
                {{ Html::image('/assets/admin/images/logos/logo-icon.png', 'dashboard') }}
                <h3 class="light-logo text-center">@lang('messages.logo')</h3>
            </a>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('full_name', old('full_name'), ['class' => ['form-control', $errors->has('full_name') ? ' is-invalid' : ''], 'placeholder' => 'Full name', 'required' => 'required', 'id' => 'full_name', 'autofocus' => 'autofocus']) !!}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::email('email', old('email'), ['class' => ['form-control', $errors->has('email') ? ' is-invalid' : ''], 'placeholder' => 'Email', 'required' => 'required', 'id' => 'email', 'autofocus' => 'autofocus']) !!}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::password('password', ['class' => ['form-control', $errors->has('password') ? ' is-invalid' : ''], 'placeholder' => 'Password', 'required' => 'required', 'id' => 'password', 'autofocus' => 'autofocus']) !!}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Password confirm', 'id' => 'password-confirm']) !!}

                </div>
            </div>

            <div class="form-group text-center m-t-20">
                <div class="col-md-12">
                    {{ Form::button(trans('messages.register'), ['class'=>'btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light', 'type'=>'submit'])}}

                </div>
            </div>

            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                <p>{{ trans('messages.account', ['name' => 'Already']) }}<a href="{{ route('login') }}" class="text-info m-l-5"><b>{{ trans('messages.login') }}</b></a></p>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

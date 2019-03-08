@extends('layouts.app')

@section('title', __('messages.reset_password'))

@section('content')
<div class="login-box card">
    <div class="card-body">
        {!! Form::open(['route' => 'password.email', 'method' => 'POST', 'class' => 'form-horizontal form-material']) !!}
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3>@lang('messages.reset_password')</h3>
                    <p class="text-muted">@lang('messages.enter_email')</p>
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::email('email', old('email'), ['class' => ['form-control', $errors->has('email') ? ' is-invalid' : ''], 'placeholder' => 'Email', 'required' => 'required']) !!}

                </div>
            </div>

            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    {{ Form::button(trans('messages.reset'), ['class'=>'btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light', 'type'=>'submit'])}}

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

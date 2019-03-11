@extends('layouts.admin.master')

@section('title', __('topic.title'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-danger">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">@lang('topic.title')</h4>
                </div>
                <div class="card-body">

                    @include('common.errors')

                    {!! Form::open(['method' => 'POST', 'route' => 'topics.store', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('topic_name', trans('topic.name')) !!}
                            {!! Form::text('topic_name', old('topic_name'), ['class' => ['form-control form-control-line'], 'required' => 'required']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('description', trans('topic.description')) !!}
                            {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 7]) !!}

                        </div>

                        <div class="form-group">
                            <label>{{ trans('topic.file_image') }}</label>
                            <div class="fileinput input-group fileinput-new" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="fa fa-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-secondary btn-file">
                                    <span class="fileinput-new">{{ trans('topic.select_file') }}</span>
                                    <span class="fileinput-exists">{{ trans('topic.change') }}</span>
                                    <input type="hidden" value=""><input type="file" name="picture">
                                </span>
                                <a href="#" class="input-group-addon btn btn-secondary fileinput-exists" data-dismiss="fileinput">{{ trans('topic.remove') }}</a>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::button(trans('topic.create'), ['class'=>'btn waves-effect waves-light btn-rounded btn-lg btn-success', 'type'=>'submit']) !!}

                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ Html::script(asset('/assets/admin/js/jasny-bootstrap.js')) }}
@endsection

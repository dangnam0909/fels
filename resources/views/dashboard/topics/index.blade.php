@extends('layouts.admin.master')

@section('title', __('messages.topic'))

@section('content')
    <h4 class="card-title">@lang('topic.list_topic')</h4>
    <div class="m-t-40">
        <div class="d-flex">
            <div class="mr-auto">
                <div class="form-group">
                    <button id="demo-btn-addrow" class="btn btn-primary btn-sm"><i class="icon wb-plus" aria-hidden="true"></i>
                        @lang('topic.add_topic')
                    </button>
                </div>
            </div>
            <div class="ml-auto">
                <div class="form-group">
                    <input id="demo-input-search2" type="text" placeholder="{{ trans('topic.search')}}" autocomplete="off">
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive full-color-table full-muted-table hover-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>@lang('topic.id')</th>
                    <th>@lang('topic.name')</th>
                    <th>@lang('topic.description')</th>
                    <th>@lang('topic.picture')</th>
                    <th>@lang('topic.created_at')</th>
                    <th class="text-nowrap">@lang('topic.action')</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($topics as $topic)
                    <tr>
                        <td>{{ $topic->id }}</td>
                        <td>{{ $topic->topic_name }}</td>
                        <td>{{ $topic->description }}</td>
                        <td>
                            <div class="col-md-9 col-xs-4">
                                {{ Html::image('/uploads/topics/' . $topic->picture, $topic->topic_name, ['class' => 'img-responsive radius']) }}
                            </div>
                        </td>
                        <td> {{ $topic->created_at}} </td>
                        <td class="text-nowrap">
                            <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                            <a href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                        </td>
                    </tr>
                @empty
                    <h3 class="text-center">{{ lang('messages.nothing') }}</h3>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="row m-t-30">
        <div class="col-md-4">

        </div>
        <div class="col-md-8">
            {{ $topics->onEachSide(2)->links('pagination.default') }}
        </div>
    </div>
@endsection

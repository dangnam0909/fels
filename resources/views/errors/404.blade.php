<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('messages.not_found_error')</title>
    @include('particals.home.styles')
</head>
<body>
    <section id="wrapper" class="error-page">
        <div class="error-custom">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">@lang('messages.not_found_error')</h3>
                <p class="text-muted m-t-30 m-b-30">@lang('messages.try_find_home')</p>
                <a href="{{ route('index') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">@lang('messages.back')</a> </div>
            @include('particals.home.footer')
        </div>
    </section>
    @include('particals.home.scripts')
</body>
</html>

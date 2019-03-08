<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <b>
                    {{ Html::image('/assets/home/images/logos/logo-icon.png', 'home page', ['class' => 'dark-logo']) }}
                    {{ Html::image('/assets/home/images/logos/logo-light-icon.png', 'home page', ['class' => 'light-logo']) }}
                </b>

                <span>
                    <h3 class="light-logo">@lang('messages.logo')</h3>
                </span>
            </a>
        </div>

        <div class="navbar-collapse">

            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Html::image('/assets/home/images/users/2.jpg', 'user', ['class' => 'profile-pic']) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        {{ Html::image('/assets/home/images/users/2.jpg', 'user') }}

                                    </div>
                                    <div class="u-text">
                                        <h4>Huan Le</h4>
                                        <p class="text-muted">ledinhhuan205@gmail.com</p>
                                        <a href="#" class="btn btn-rounded btn-danger btn-sm">@lang('messages.view_profile')</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-power-off"></i>@lang('messages.logout')</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

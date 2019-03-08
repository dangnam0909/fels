<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile" style="background: url(../assets/admin/images/backgrounds/dashboard.jpg) no-repeat;">
            <div class="profile-img">
                {{ Html::image('/assets/admin/images/users/' . Auth::user()->avatar, Auth::user()->full_name) }}
            </div>
        </div>

        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">@lang('messages.dashboard')</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

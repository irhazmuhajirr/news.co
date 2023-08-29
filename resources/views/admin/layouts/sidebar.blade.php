<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin-dashboard') }}">
                <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="" style="width: 100px;">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin-dashboard') }}"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/top-advertisement') || Request::is('admin/home-advertisements') || Request::is('admin/sidebar-advertisement*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-bullhorn"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-advertisement') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-top-advertisement') }}"><i class="fa-solid fa-angle-right"></i>Top Advertisement</a>
                    </li>
                    <li class="{{ Request::is('admin/home-advertisements') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-home-advertisements') }}"><i class="fa-solid fa-angle-right"></i>Home Advertisement</a>
                    </li>
                    <li class="{{ Request::is('admin/sidebar-advertisement*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-sidebar-advertisements') }}"><i class="fa-solid fa-angle-right"></i>Sidebar Advertisement</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/news-categor*') || Request::is('admin/sub-categor*') || Request::is('admin/post*') || Request::is('admin/author*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-newspaper"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/news-categor*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-news-categories') }}"><i class="fa-solid fa-angle-right"></i>Categories</a></li>
                    <li class="{{ Request::is('admin/sub-categor*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-sub-categories') }}"><i class="fa-solid fa-angle-right"></i>Sub Categories</a></li>
                    <li class="{{ Request::is('admin/post*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-posts') }}"><i class="fa-solid fa-angle-right"></i>Posts</a></li>
                    <li class="{{ Request::is('admin/author*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-authors-dashboard') }}"><i class="fa-solid fa-angle-right"></i>Authors</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/photo*') || Request::is('admin/video*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-images"></i><span>Gallery</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/photo*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-photos') }}"><i class="fa-solid fa-angle-right"></i> Photos</a></li>
                    <li class="{{ Request::is('admin/video*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-videos') }}"><i class="fa-solid fa-angle-right"></i> Videos</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/page/*') || Request::is('admin/faq*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-layer-group"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-page-about') }}"><i class="fa-solid fa-angle-right"></i>
                            About</a>
                    </li>
                    <li class="{{ Request::is('admin/page/faq*') || Request::is('admin/faq*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-page-faq') }}"><i class="fa-solid fa-angle-right"></i>
                            FAQ</a>
                    </li>
                    <li class="{{ Request::is('admin/page/contact*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-page-contact') }}"><i class="fa-solid fa-angle-right"></i>
                            Contact</a>
                    </li>
                    <li class="{{ Request::is('admin/page/terms*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-page-terms') }}"><i class="fa-solid fa-angle-right"></i>
                            Terms and Conditions</a>
                    </li>
                    <li class="{{ Request::is('admin/page/privacy-policy*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-page-privacy') }}"><i class="fa-solid fa-angle-right"></i>
                            Privacy Policy</a>
                    </li>
                    <li class="{{ Request::is('admin/page/disclaimer*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-page-disclaimer') }}"><i class="fa-solid fa-angle-right"></i>
                            Disclaimer</a>
                    </li>
                    <li class="{{ Request::is('admin/page/login*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-page-login') }}"><i class="fa-solid fa-angle-right"></i>
                            Login</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/live-channel*') || Request::is('admin/online-poll*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-brands fa-elementor"></i><span>Sidebar</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/live-channel*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-live-channels') }}"><i class="fa-solid fa-angle-right"></i>
                            Live Channels</a>
                    </li>
                    <li class="{{ Request::is('admin/online-poll*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-online-polls') }}"><i class="fa-solid fa-angle-right"></i>
                            Online Polls</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/subscribers/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-people-group"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscribers/list*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-subscribers-list') }}"><i class="fa-solid fa-angle-right"></i>
                            All Subscribers</a>
                    </li>
                    <li class="{{ Request::is('admin/subscribers/send-email*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-subscribers-send-email') }}"><i class="fa-solid fa-angle-right"></i>
                            Send Email</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/setting*') || Request::is('admin/social-media*') || Request::is('admin/language*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/setting*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-setting') }}"><i class="fa-solid fa-angle-right"></i>
                            Home</a>
                    </li>
                    <li class="{{ Request::is('admin/language*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-languages') }}"><i class="fa-solid fa-angle-right"></i>
                            Languages </a>
                    </li>
                    <li class="{{ Request::is('admin/social-media*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-social-media') }}"><i class="fa-solid fa-angle-right"></i>
                            Social Media </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>


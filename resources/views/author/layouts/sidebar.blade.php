<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('author-dashboard') }}">
                <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="" style="width: 100px;">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('author-dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('author-dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('author/post*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('author-posts') }}"><i class="fas fa-hand-point-right"></i> <span>News</span></a>
            </li>
            {{-- <li class="nav-item dropdown {{ Request::is('admin/news-categor*') || Request::is('admin/sub-categor*') || Request::is('admin/post*') || Request::is('admin/author*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/news-categor*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-news-categories') }}"><i class="fas fa-angle-right"></i>Published</a></li>
                    <li class="{{ Request::is('admin/sub-categor*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin-sub-categories') }}"><i class="fas fa-angle-right"></i>Pending</a></li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>


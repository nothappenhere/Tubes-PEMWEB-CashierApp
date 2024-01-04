<div class="sidebar">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                CA
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                Cashier App
            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="tim-icons icon-components"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @can('view_dashboard')
                <li>
                    <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                        <i class="tim-icons icon-puzzle-10"></i>
                        <span class="nav-link-text">Profile Settings</span>
                        <b class="caret mt-1"></b>
                    </a>
                    <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li>
                                <a href="{{ route('admin.profile.user-profile') }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>User Profile</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.profile.user-manage') }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>User Management</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('admin.product.show') }}">
                        <i class="tim-icons icon-notes"></i>
                        <p>Product</p>
                    </a>
                </li>
            @endcan
            @can('view_dashboard_user_guest')
                <li>
                    <a href="{{ route('admin.profile.user-profile') }}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>User Profile</p>
                    </a>
                </li>
            @endcan
            <li>
                <a href="{{ route('logout') }}">
                    <i class="tim-icons icon-user-run"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>

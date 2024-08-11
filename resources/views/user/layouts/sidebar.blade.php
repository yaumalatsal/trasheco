<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user') }}">
        <img src="{{ asset('logonew.png') }}" style="width: 45px" alt="">
        <div class="sidebar-brand-text mx-3">User</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('users-active')">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Shop
    </div>
    <!--Orders -->
    <li class="nav-item @yield('order-active')">
        <a class="nav-link" href="{{ route('user.order.index') }}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>
    <li class="nav-item @yield('reward-active')">
        <a class="nav-link" href="{{ route('user.reward.index') }}">
            <i class="fas fa-gift"></i>
            <span>Rewards</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

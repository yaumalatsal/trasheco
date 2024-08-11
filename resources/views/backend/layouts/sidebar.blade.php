<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
        <img src="{{ asset('logonew.png') }}" style="width: 45px" alt="">
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('admin-active')">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if (auth()->user()->role == 'admin')
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Heading -->
        <div class="sidebar-heading">
            Masters
        </div>

        <!-- Faculties -->
        <li class="nav-item @yield('faculty-active')">
            <a class="nav-link" href="{{ route('faculty.index') }}">
                <i class="fas fa-building"></i>
                <span>Faculties</span>
            </a>
        </li>

        <!-- Categories -->
        <li class="nav-item @yield('category-active')">
            <a class="nav-link" href="{{ route('category.index') }}">
                <i class="fas fa-sitemap"></i>
                <span>Category</span>
            </a>
        </li>

        {{-- Products --}}
        <li class="nav-item @yield('product-active')">
            <a class="nav-link" href="{{ route('product.index') }}">
                <i class="fas fa-cubes"></i>
                <span>Products</span>
            </a>
        </li>

        {{-- Rewards --}}
        <li class="nav-item @yield('reward-active')">
            <a class="nav-link" href="{{ route('reward.index') }}">
                <i class="fas fa-gift"></i>
                <span>Rewards</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Heading -->
        <div class="sidebar-heading">
            Transactions
        </div>

        <!--Orders -->
        <li class="nav-item @yield('order-active')">
            <a class="nav-link" href="{{ route('order.index') }}">
                <i class="fas fa-hammer fa-chart-area"></i>
                <span>Orders</span>
            </a>
        </li>

        <!--Reward Request -->
        <li class="nav-item @yield('reward_requests-active')">
            <a class="nav-link" href="{{ route('reward_requests.index') }}">
                <i class="fas fa-money fa-gifts"></i>
                <span>Reward Request</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Heading -->
        <div class="sidebar-heading">
            General Settings
        </div>
        <!-- Users -->
        <li class="nav-item @yield('users-active')">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-users"></i>
                <span>Users</span></a>
        </li>
    @endif

    @if (auth()->user()->role == 'admin_cabang')
        <li class="nav-item @yield('order-active')">
            <a class="nav-link" href="{{ route('order.index') }}">
                <i class="fas fa-hammer fa-chart-area"></i>
                <span>Orders</span>
            </a>
        </li>
        <!--Reward Request -->
        <li class="nav-item @yield('reward_requests-active')">
            <a class="nav-link" href="{{ route('reward_requests.index') }}">
                <i class="fas fa-money fa-gifts"></i>
                <span>Reward Request</span>
            </a>
        </li>
    @endif

    <!-- General settings -->
    {{-- <li class="nav-item @yield('settings-active')">
        <a class="nav-link" href="{{ route('settings') }}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

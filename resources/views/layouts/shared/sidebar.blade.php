<div class="page-wrapper toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu"><span>E-commarce</span></li>
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li><a href="{{ route('order') }}"><i class="fa fa-shopping-cart"></i><span>Orders<span></a></li>
                    <li><a href="{{ route('category') }}"><i class="fa fa-tag"></i><span>Categories</span></a></li>
                    <li><a href="{{ route('product') }}"><i class="fa fa-product-hunt"></i><span>Product</span></a></li>
                    <li class="header-menu"><span>Reports</span></li>
                    <li><a href="#"><i class="fa fa-bar-chart-o"></i><span>Salles Report<span></a></li>
                    <li><a href="{{ route('category') }}"><i class="fa fa-line-chart"></i><span>Order Report</span></a>
                    </li>
                    <li class="header-menu"><span>Authentication</span></li>
                    <li><a href="{{ route('users') }}"><i class="fa fa-user"></i><span>Users<span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page-content ">
        @include('layouts.shared.navbar')
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>
</div>

<div class="page-wrapper toggled">
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <!--a href="#" id="toggle-sidebar"><i class="fa fa-bars"></i></a-->
      <div class="sidebar-brand">
        <a  href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://azouaoui-med.github.io/pro-sidebar-template/bootstrap3/assets/img/user.jpg" alt="">
        </div>
        <div class="user-info">
          <span class="user-name"> <strong> {{ Auth::user()->name }} </strong></span>
          <span class="user-role">Administrator</span>
          <div class="user-status">
            <a href="#">
              <i class="fa fa-circle"></i>
              <span>Online</span></a>
          </div>
        </div>
      </div>
      
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu"><span>General</span></li>
          <li class="sidebar-dropdown">
            <a href="#"><i class="fa fa-dashboard"></i><span>Dashboard</span><span class="label label-danger">New</span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="#">Dashboard 1<span class="label label-success">Pro</span></a> </li>
                <li><a href="#">Dashboard 2</a></li>
                <li><a href="#">Dashboard 3</a></li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#"><i class="fa fa-shopping-cart"></i><span>E-commerce</span><span class="badge">3</span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="#">Products<span class="badge">2</span></a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Credit cart</a></li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="{{ route('category')}}"><i class="fa fa-diamond"></i><span>Categories</span></a>
            <!--div class="sidebar-submenu">
              <ul>
                <li><a href="#">Create</a></li>
                <li><a href="#">Panels</a></li>
                <li><a href="#">Tables</a></li>
                <li><a href="#">Icons</a></li>
                <li><a href="#">Forms</a></li>
              </ul>
            </div-->
          </li>
          <li class="sidebar-dropdown">
            <a href="{{ route('product')}}"><i class="fa fa-bar-chart-o"></i><span>Product</span></a>
            <!--div class="sidebar-submenu">
              <ul>
                <li><a href="#">Pie chart</a></li>
                <li><a href="#">Line chart</a></li>
                <li><a href="#">Bar chart</a></li>
                <li><a href="#">Histogram</a></li>


              </ul>
            </div-->
          </li>

          <li class="sidebar-dropdown">
            <a href="#"><i class="fa fa-globe"></i><span>Maps</span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="#">Google maps</a></li>
                <li><a href="#">Open street map</a></li>
              </ul>
            </div>
          </li>
          <li class="header-menu"><span>Extra</span></li>
          <li><a href="#"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
          <li><a href="#"><i class="fa fa-folder"></i><span>Examples</span></a></li>

          <li><a href="#"><i class="fa fa-book"></i><span>Documentation</span></a></li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
  @include('layouts.shared.navbar')
    <div class="container-fluid">      
       <main class="py-4">
                
                @yield('content')
            </main>      
    </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
<script>
    $(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(250);
    if (
      $(this)
        .parent()
        .hasClass("active")
    ) {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .parent()
        .removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .next(".sidebar-submenu")
        .slideDown(250);
      $(this)
        .parent()
        .addClass("active");
    }
  });
  
  $("#toggle-sidebar").click(function() {
    $(".page-wrapper").toggleClass("toggled");
  });
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/5.15.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/5.15.4/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="http://127.0.0.1:8000/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="http://127.0.0.1:8000/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <!-- NProgress -->
    <link href="http://127.0.0.1:8000/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="http://127.0.0.1:8000/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="http://127.0.0.1:8000/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>



                </ul>
              </div>
              <div class="menu_section">

              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        {{-- @include('alert.messages') --}}
        @yield('content')

    </div>
</div>

<!-- jQuery -->
<script src="http://127.0.0.1:8000/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="http://127.0.0.1:8000/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="http://127.0.0.1:8000/js/fastclick.js"></script>
<!-- NProgress -->
<script src="http://127.0.0.1:8000/js/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="http://127.0.0.1:8000/js/bootstrap-progressbar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="http://127.0.0.1:8000/js/custom.min.js"></script>
</body>
</html>

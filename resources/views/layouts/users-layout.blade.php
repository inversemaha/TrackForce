<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="/" class="logo"> <img style="padding-left: 20px;padding-right: 10px;" alt="" src="/images/logo.png"
                                       height="50px"> <a href="/" class="logo"> Track <span>Force</span></a></a>


        <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="/img/avatar1_small.jpg">
                        <span class="username">{{ Session('user_full_name') }}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="/setting"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="/setting"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="/setting"><i class="fa fa-bell-o"></i> Notification</a></li>
                        <li><a href="/logout"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
@include('includes.navigation')
<!--sidebar end-->

    <!--main content start-->
@yield('content')
<!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2017 &copy; DeltaPvc.
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>
@include(('includes.footer'))

</body>
</html>
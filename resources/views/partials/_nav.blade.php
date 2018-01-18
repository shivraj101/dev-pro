<style type="text/css">
    .navbar-default .navbar-nav > li > a {
        text-shadow: 1px 1px 1px black !important;{{--left to right, top to button, blur, color--}}
    }
    .navbar-default .navbar-nav > li > a:hover{
        color: skyblue;
    }
    .navbar-default .navbar-brand {
    color: white;
    }
    .navbar-custom .navbar-header .navbar-toggle{
        color: white;
    }

</style>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/">SoulSociety</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active":"" }}" >
                    <a href="/" >Home</a>
                </li>
                <li class="{{ Request::is('blog') ? "active":"" }}" >
                    <a href="/blog" >Blog</a>
                </li>
                <li class="{{ Request::is('about') ? "active":""}}"><!---->
                    <a href="/about">About</a>
                </li>
                <li class="{{ Request::is('contact') ? "active":""}}"><!---->
                    <a href="/contact">Contact</a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                <li class="dropdown" >
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome {{ Auth::user()->name}}<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class=""><a href="#">{{ Auth::check() ? "You are logged in !!":"You are logged out !!" }}</a></li>
                    <li><a href="/posts/create">Create a new post here</a></li>
                    <li><a href="/posts">Show my posts</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{Auth::check() ? "/logout" : "/login"}}">{{Auth::check() ? "Logout" : "Login"}}</a></li>
                  </ul>
                </li>
            @else
                    <li class="dropdown" >
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log In<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li class=""><a href="#">{{ Auth::check() ? "You are logged in !!":"You are logged out !!" }}</a></li>
                        <li class=""><a href="{{ route('auth.login')}}">LogIn</a></li>
                      </ul>
                    </li>
            @endif
            </ul><!--dropdown to the right side of navbar-->
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
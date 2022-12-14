<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{url('')}}"><img src="{{asset('public/image/logo/logo.png')}}"
                        style="width:250px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="nav-item {{request()->is('about') ? 'active' : '' }}"><a class="nav-link" href="{{url('about')}}">About</a></li>
                        <li class="nav-item">
                            <a href="{{url('login')}}" class="nav-link"><span class="ti-user"></span></a>
                        </li>
                    </ul>
                    <!-- <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="{{url('login')}}" class="cart"><span class="ti-user"></span></a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>
    </div>
    
</header>
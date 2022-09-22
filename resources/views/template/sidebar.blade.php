<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <span class="icon-bg"><i class="mdi mdi-view-dashboard  menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{request()->is('eventmanagement') ? 'active' : ''}}">
            <a class="nav-link" href="{{url('eventmanagement')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Event</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <span class="icon-bg"><i class="mdi mdi-ticket-confirmation   menu-icon"></i></span>
                <span class="menu-title">Pesanan Tiket</span>
            </a>
        </li>

        <li class="nav-item {{request()->is('scanticket') ? 'active' : ''}}">
            <a class="nav-link"  href="{{url('scanticket')}}">
                <span class="icon-bg"><i class="mdi mdi-barcode-scan  menu-icon"></i></span>
                <span class="menu-title">Scan Tiket</span>
            </a>
        </li>

        <li class="nav-item {{request()->is('usermanagement') ? 'active' : ''}}">
            <a class="nav-link" href="{{url('usermanagement')}}">
                <span class="icon-bg"><i class="mdi mdi-account-multiple  menu-icon"></i></span>
                <span class="menu-title">User</span>
            </a>
        </li>
 
    </ul>
</nav>
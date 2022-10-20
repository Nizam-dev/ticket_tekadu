<li class="nav-item {{request()->is('dashboard') ? 'active' : ''}}">
    <a class="nav-link" href="{{url('dashboard')}}">
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


<li class="nav-item {{request()->is('scanticket') ? 'active' : ''}}">
    <a class="nav-link" href="{{url('scanticket')}}">
        <span class="icon-bg"><i class="mdi mdi-barcode-scan  menu-icon"></i></span>
        <span class="menu-title">Scan Tiket</span>
    </a>
</li>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        
        @if(auth()->user()->role == "owner")
            @include('template.role.owner')
        @else
            @include('template.role.staff')
        @endif
 
    </ul>
</nav>
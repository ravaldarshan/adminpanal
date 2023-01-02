<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if(auth()->user()->role_as == 1)
        <li class="nav-item {{ Request::is('adminpanal') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="icon-grid icon-sm mr-2"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @else 
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="mdi mdi-view-dashboard icon-sm pr-2"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @endif 
        <li class="nav-item {{ Request::is('adminpanal/employees') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('employees.index')}}">
                <i class="mdi mdi-account icon-sm pr-2"></i>
                <span class="menu-title">Employees</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
            aria-controls="ui-basic">
            <i class="mdi mdi-settings icon-sm pr-2"></i>
                <span class="menu-title">Manage</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{route('policy.index')}}">Manage Policy</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/dropdowns.html">Manage Holidays</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/typography.html">Manage Permissions</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/typography.html">Manage Salary</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-timetable icon-sm pr-2"></i>
                <span class="menu-title">Employees In/Out</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-newspaper icon-sm pr-2"></i>
                <span class="menu-title">News</span>
            </a>
        </li>
        
    </ul>
</nav>
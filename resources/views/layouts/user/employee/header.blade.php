    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{route('employee.dashboard')}}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" alt="" width="50px">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('employee.dashboard') }}" class="nav-item nav-link">DASHBOARD</a>
                <a href="{{ route('employee.applications.all') }}" class="nav-item nav-link">MY APPLICATIONS</a>
                <a href="{{ route('employee.jobs.avilable') }}" class="nav-item nav-link">AVILABLE DEMANDS</a>
                <a href="{{ route('employee.invoices') }}" class="nav-item nav-link">BILLING</a>
                <a href="{{ route('employee.case.index') }}" class="nav-item nav-link">CASES</a>
                <a href="{{ route('user.contact') }}" class="nav-item nav-link">Contact</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('profile.index')}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Demands</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('employer.jobs.all')}}" class="dropdown-item">All Demands</a>
                        <a href="{{route('employer.jobs.active')}}" class="dropdown-item">Active Demands</a>
                        <a href="{{route('employer.jobs.completed')}}" class="dropdown-item">Completed Demands</a>
                        <a href="{{route('employer.jobs.pending')}}" class="dropdown-item">Pending Demands</a>
                        <a href="{{route('employer.jobs.cancelled')}}" class="dropdown-item">Cancelled Demands</a>
                        <a href="{{route('employer.jobs.returned')}}" class="dropdown-item">Returned Demands</a>
                    </div>
                </div> --}}

            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <img src="{{ asset('assets/dist_3/assets/images/header-logo.png') }}" alt="" width="50px">
            ALSHOLA
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('employee.dashboard') }}" class="nav-item nav-link">DASHBOARD</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">MY APPLICATIONS</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('employee.applications.all') }}" class="dropdown-item">ALL APPLICATIONS</a>
                        <a href="{{ route('employee.applications.medical') }}" class="dropdown-item">WAITING FOR MEDICAL</a>
                        <a href="{{ route('employee.applications.visa') }}" class="dropdown-item">WAITING FOR VISA</a>
                    </div>
                </div>
                <a href="{{ route('employee.jobs.avilable') }}" class="nav-item nav-link">AVILABLE JOBS</a>
                <a href="{{ route('user.contact') }}" class="nav-item nav-link">Contact</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('profile.index')}}" class="dropdown-item">Profile</a>
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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('employer.jobs.all')}}" class="dropdown-item">All Jobs</a>
                        <a href="{{route('employer.jobs.active')}}" class="dropdown-item">Active Jobs</a>
                        <a href="{{route('employer.jobs.completed')}}" class="dropdown-item">Completed Jobs</a>
                        <a href="{{route('employer.jobs.pending')}}" class="dropdown-item">Pending Jobs</a>
                        <a href="{{route('employer.jobs.cancelled')}}" class="dropdown-item">Cancelled Jobs</a>
                        <a href="{{route('employer.jobs.returned')}}" class="dropdown-item">Returned Jobs</a>
                    </div>
                </div> --}}

            </div>
        </div>
    </nav>
    <!-- Navbar End -->

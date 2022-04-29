    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h1 class="m-0 text-primary">JobEntry</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('employee.dashboard')}}" class="nav-item nav-link">DASHBOARD</a>
                <a href="{{ route('employee.jobs.avilable') }}" class="nav-item nav-link">AVILABLE JOBS</a>
                <a href="{{ route('contact.index') }}" class="nav-item nav-link">Contact</a>
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

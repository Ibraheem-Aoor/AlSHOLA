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
                <a href="/" class="nav-item nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('categories') }}" class="nav-item nav-link">Job Category</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('job.index')}}" class="dropdown-item">All Jobs</a>
                        <a href="{{route('employer.jobs.active')}}" class="dropdown-item">Active Jobs</a>
                        <a href="{{route('employer.jobs.completed')}}" class="dropdown-item">Completed Jobs</a>
                        <a href="{{route('employer.jobs.pending')}}" class="dropdown-item">Pending Jobs</a>
                        <a href="{{route('employer.jobs.cancelled')}}" class="dropdown-item">Cancelled Jobs</a>
                    </div>
                </div>
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="nav-item nav-link ">LogIn</a>
            </div>
        @else
            <a href="{{ route('job.create') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A
                Job<i class="fa fa-arrow-right ms-3"></i></a>
            @endif
        </div>
    </nav>
    <!-- Navbar End -->

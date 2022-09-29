    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{route('employer.dashboard')}}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" alt="" width="50px">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('employer.dashboard') }}" class="nav-item nav-link">DASHBOARD</a>
                <a href="{{ route('employer.jobs.all') }}" class="nav-item nav-link">DEMANDS</a>
                <a href="{{ route('employer.applications.all') }}" class="nav-item nav-link">Applications</a>
                <a href="{{ route('employer.invoices') }}" class="nav-item nav-link">BILLING</a>
                {{-- <a href="{{ route('cases.index') }}" class="nav-item nav-link">Cases</a> --}}

                <div class="nav-item dropdown">
                    <a href="employer.jobs.all" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cases</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('cases.index') }}" class="dropdown-item">ALL CASES</a>
                        <a href="{{ route('cases.create') }}" class="dropdown-item">NEW CASE</a>
                    </div>
                </div>

                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Applications</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('employer.applications.all') }}" class="dropdown-item">ALL APPLICATIONS</a>
                        <a href="{{ route('employer.applications.medical') }}" class="dropdown-item">WAITING FOR
                            MEDICAL</a>
                        <a href="{{ route('employer.applications.visa') }}" class="dropdown-item">WAITING FOR
                            VISA</a>
                    </div>
                </div> --}}
                <a href="{{ route('user.contact') }}" class="nav-item nav-link">Contact</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('profile.index') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i> Profile</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{ route('job.create') }}" class="btn btn-secondary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post
                A
                Demand<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

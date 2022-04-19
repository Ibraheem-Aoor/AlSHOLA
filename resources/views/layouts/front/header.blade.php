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
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="nav-item nav-link ">LogIn</a>
            </div>
            <a href="{{ route('register') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A
                Job<i class="fa fa-arrow-right ms-3"></i></a>
                @else
                <a href="/dashboard" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Go To DashBoard<i class="fa fa-arrow-right ms-3"></i></a>
            @endif
        </div>
    </nav>
    <!-- Navbar End -->

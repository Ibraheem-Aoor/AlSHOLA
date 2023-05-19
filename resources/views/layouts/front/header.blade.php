<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <div class="row text-right w-100">
        <div class="col-sm-12">
            <a href="https://alshoala.com/" class="navbar-brand d-flex align-items-center justify-content-center py-0 px-4 px-lg-5">
                <img src="{{ asset('assets/dist_3/assets/images/logo.png') }}" style="width:28% !important;" id="logo-header">
            </a>
        </div>
    </div>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            {{-- <a href="{{ route('about') }}" class="nav-item nav-link">About</a> --}}
            {{-- <a href="{{ route('categories') }}" class="nav-item nav-link">INDUSTRIES</a> --}}
            {{-- <a href="{{ route('contact.index') }}" class="nav-item nav-link">Contact</a> --}}
            @if (!Auth::check())
        </div>
        <a href="{{ route('register') }}"
            class="btn btn-secondary rounded-0 py-4 px-lg-5 d-none d-lg-block">Register</a>
    @else
        @php
            $type = Auth::user()->type;
            $actualType = '';
            switch ($type) {
                case 'Client':
                    $actualType = 'employer';
                    break;
                case 'Agent':
                    $actualType = 'employee';
                    break;
            }
        @endphp
        <a href="{{ route($actualType . '.dashboard') }}"
            class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Go
            To
            DashBoard<i class="fa fa-arrow-right ms-3"></i></a>
        @endif
    </div>
</nav>
<!-- Navbar End -->

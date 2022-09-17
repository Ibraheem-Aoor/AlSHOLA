
<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img
                    src="{{ asset('assets/dist_3/assets/images/logo.png') }}" alt="Logo" width="12%"></a>
            <a class="navbar-brand hidden" href="./"><img
                    src="{{ asset('assets/dist_3/assets/images/logo2.png') }}"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                {{-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div> --}}

                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        @php
                            $unReadNotifications = Auth::user()
                                ->unReadnotifications()
                                ->where('type', '!=', 'App\Notifications\NewContactNotification')
                                ->get();
                        @endphp
                        <span class="count bg-danger">{{ $count_1 = $unReadNotifications->count() }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have {{ $count_1 }} Notification</p>
                        @forelse($unReadNotifications as $notification)
                            <a class="dropdown-item media" href="{{ route('admin.notficiation', $notification->id) }}">
                                <i class="fa fa-file-text"></i>
                                <p>{{ $notification->data['message'] }}</p>
                            </a>
                        @empty
                        @endforelse

                    </div>
                </div>

                <div class="dropdown for-message">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="message"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                        <span
                            class="count bg-primary">{{ $count_2 = Auth::user()->unReadnotifications->where('type', 'App\Notifications\NewContactNotification')->count() }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="message">
                        <p class="red">You have {{ $count_2 }} Contacts
                        </p>
                        @forelse(Auth::user()->unReadnotifications->where('type' , 'App\Notifications\NewContactNotification') as $notification)
                            <a class="dropdown-item media"
                                href="{{ route('admin.notficiation', $notification->id) }}">
                                <span class="photo media-left"><i class="fa fa-user"></i></span>
                                <div class="message media-body">
                                    <span class="name float-left">{{ $notification->data['name'] }}</span>
                                    <span
                                        class="time float-right">{{ $notification->created_at->diffForHumans() }}</span>
                                    <p>{{ Str::limit($notification->data['message'], '30', '....') }}</p>
                                </div>
                            @empty
                        @endforelse
                        </a>
                    </div>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">

                    @if (Auth::user()->avatar == 'user.png')
                        <img class="user-avatar rounded-circle mx-auto d-block"
                            src="{{ Storage::url('public/uploads/avatars/users/' . Auth::user()->avatar) }}"
                            alt="Card image cap">
                    @else
                        <img class="user-avatar rounded-circle mx-auto d-block"
                            src="{{ Storage::url('public/uploads/avatars/users/' . Auth::id() . '/' . Auth::user()->avatar) }}"
                            alt="Card image cap">
                    @endif
                </a>

                <div class="user-menu dropdown-menu" style="left: -60px !important;">
                    <a class="nav-link" href="{{ route('admin.profile') }}"><i class="fa fa- user"></i>My
                        Profile</a>



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
    </div>
</header>
<!-- /#header -->


<!-- /#right-panel -->

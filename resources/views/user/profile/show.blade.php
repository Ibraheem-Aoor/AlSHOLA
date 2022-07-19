@switch(Auth::user()->type)
    @case('Agent')
        @php
        $user = 'employee';
        @endphp
    @break

    @case('Client')
        @php
        $user = 'employer';
        @endphp
    @endswitch
    @extends('layouts.user.' . $user . '.master')
    @section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">PERSONAL INFORMATION</h1>
            <div class="row g-4">
                <form action="{{ route('profile.update', Auth::id()) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">

                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"  value="{{ Auth::user()->name }}"
                                    name="name">
                                <label for="email"><i class="fa fa-user"></i> Name</label>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                    name="email">
                                <label for="email"><i class="fa fa-envelope"></i> E-mail</label>
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating ">
                                <input type="password" name="password" class="form-control">
                                <label for="brief"><i class="fa fa-lock"></i> Password</label>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation" class="form-control">
                                <label for="brief"><i class="fa fa-lock"></i> Confirm Password</label>
                            </div>
                        </div>


                        <div class="col-4">
                            <button class="btn btn-outline-info w-100 py-3" type="submit"><i class="fa fa-cofg"></i>
                                UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>



</div>
</div>
@endsection

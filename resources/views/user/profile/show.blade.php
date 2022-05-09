@switch(Auth::user()->type)
    @case('Talented')
        @php
        $user = 'employee';
        @endphp
    @break
    @case('Employer')
        @php
        $user = 'employer';
        @endphp
    @endswitch
    @extends('layouts.user.'.$user.'.master')
    @section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Applications For Your Job Posts</h1>
            <div class="row g-4">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="passaword" readonly
                                value="{{ Auth::user()->name }}">
                            <label for="email"><i class="fa fa-user"></i> Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="passaword" readonly
                                value="{{ Auth::user()->email }}">
                            <label for="email"><i class="fa fa-envelope"></i> E-mail</label>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-floating">
                            <textarea type="text" class="form-control" placeholder="brief" readonly>{{ Auth::user()->brief }}</textarea>
                            <label for="brief"><i class="fa fa-scroll"></i> brief about you</label>
                        </div>
                    </div>


                    <div class="col-4">
                        <a href="{{ route('profile.create') }}" class="btn btn-outline-info w-100 py-3"
                            type="submit"><i class="fa fa-cofg"></i> UPDATE</a>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
</div>
@endsection

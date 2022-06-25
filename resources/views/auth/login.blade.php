@extends('layouts.front.master')
@section('title', 'ALSHOALA | LogIn')
@section('content')
    @php
    $page = 'LogIn';
    @endphp
    @include('front.header')
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">LogIn Using E-mail</h1>
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                                            @error('email') is-invalid @enderror name="email" value="{{ old('email') }}"
                                            required autocomplete="email" autofocus>
                                        <label for="email"><i class="fa fa-envelope"></i> Your Email</label>
                                        @error('email')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="passaword"
                                            placeholder="Your Password" @error('password') is-invalid @enderror
                                            name="password" required autocomplete="current-password">
                                        <label for="email"><i class="fa fa-lock"></i> Password</label>
                                        @error('password')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <a class="text-danger col-sm-6 mr-auto" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">LogIn</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

@extends('layouts.front.master')
@section('title', 'CONTACT US')
@section('content')
    @php
    $page = 'CONTACT US';
    @endphp
    @include('front.header')
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center bg-light rounded p-4" style="min-height: 150px;">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-map-marker-alt text-primary"></i>
                                </div>
                                <span>{{ Cache::get('businessSetting')->where('key', 'address')->first()->value }}</span>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center bg-light rounded p-4" style="min-height: 150px;">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-envelope-open text-primary"></i>
                                </div>
                                <span>{{ Cache::get('businessSetting')->where('key', 'email')->first()->value }}</span>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex align-items-center bg-light rounded p-4" style="min-height: 150px;">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <span>{{ Cache::get('businessSetting')->where('key', 'telephone')->first()->value }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3579.537133818348!2d50.5757253!3d26.2117313!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ses!4v1650854521988!5m2!1sen!2ses"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <p class="mb-4">
                            If There is any Queries We Are Here To Help!
                        </p>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Your Name " required
                                            data-validation-required-message="Please enter your name">
                                        <label for="name">Your Name</label>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Subject" required>
                                        <label for="subject">Subject</label>
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" required
                                            style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary w-100 py-3" type="submit">Send Message</button>
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

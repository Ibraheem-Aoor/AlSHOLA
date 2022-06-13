<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-4">Company</h5>
                <a class="btn btn-link text-white-50" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link text-white-50"
                    href="@if (Auth::check()) {{ route('user.contact') }}@else{{ route('contact.index') }} @endif">Contact
                    Us</a>
                <a class="btn btn-link text-white-50" href="{{ route('categories') }}">Our Services</a>
                <a class="btn btn-link text-white-50" href="#">Terms & Condition</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link text-white-50"
                    href="@if (Auth::check()) {{ route('user.contact') }}@else{{ route('contact.index') }} @endif">Contact
                    Us</a>
                <a class="btn btn-link text-white-50" href="{{ route('categories') }}">Our Services</a>
                <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-4">Contact</h5>
                <p class="mb-2"><i
                        class="fa fa-map-marker-alt me-3"></i>{{ Cache::get('businessSetting')->where('key', 'address')->first()->value }}
                </p>
                <p class="mb-2"><i
                        class="fa fa-phone-alt me-3"></i>{{ Cache::get('businessSetting')->where('key', 'telephone')->first()->value }}
                </p>
                <p class="mb-2"><i
                        class="fa fa-envelope me-3"></i>{{ Cache::get('businessSetting')->where('key', 'email')->first()->value }}
                </p>
                <div class="d-flex pt-2">
                    <a target="_blank" class="btn btn-outline-light btn-social"
                        href="{{ Cache::get('businessSetting')->where('key', 'twitter')->first()->value }}"><i
                            class="fab fa-twitter"></i></a>
                    <a target="_blank" class="btn btn-outline-light btn-social"
                        href="{{ Cache::get('businessSetting')->where('key', 'facebook')->first()->value }}"><i
                            class="fab fa-facebook-f"></i></a>
                    <a target="_blank" class="btn btn-outline-light btn-social"
                        href="{{ Cache::get('businessSetting')->where('key', 'instagram')->first()->value }}"><i
                            class="fab fa-instagram"></i></a>
                    <a target="_blank" class="btn btn-outline-light btn-social"
                        href="{{ Cache::get('businessSetting')->where('key', 'linkedin')->first()->value }}"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6">
                          <h5 class="text-white mb-4">Newsletter</h5>
                          <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                          <div class="position-relative mx-auto" style="max-width: 400px;">
                              <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                              <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                          </div>
                      </div> -->
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 text-center  mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ route('home') }}">ALSHOLA</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

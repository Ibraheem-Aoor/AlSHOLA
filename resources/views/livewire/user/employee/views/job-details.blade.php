<div>
    @section('title', 'title')
    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        {{-- <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt=""
                            style="width: 80px; height: 80px;"> --}}
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job->title->name }}</h3>
                            <span class="text-truncate me-0"><i class="fa fa-sun text-primary me-2"></i>
                                {{ $job->status }}
                            </span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>
                                {{ $job->salary }}
                            </span>
                            <span class="text-truncate me-0"><i class="fa fa-clock text-primary me-2"></i>
                                {{ $job->contract_period }}
                            </span>
                        </div>
                    </div>


                    <div class="mb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4>Contract Period:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->contract_period }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Accommodation:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->accommodation }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Medical:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->medical }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Insurance:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->insurance }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>annual_leave:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->annual_leave }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Covid-19 Test:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->covid_test }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Cindemnity, leave, and overtime salary:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->covid_test }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Food:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->food }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Transport:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->transport }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Air Ticket:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->air_ticket }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <h4>Job description:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->description }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <h4>Other Terms:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->other_terms }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!Auth::user()->hasAppliedToJob($job->id))
                        <div class="">
                            <h4 class="mb-4">What You want to do?</h4>
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">

                                    <button type="button" class="btn btn-outline-warning col-sm-12 mb-2"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal_1">Refuse The Offer
                                    </button>
                                    <button type="button" class="btn btn-outline-info col-sm-12 mb-2"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal_2">
                                        Send a comment
                                    </button>
                                    <a class="btn btn-outline-success col-sm-12 mb-2"
                                        href="{{route('employee.application.form' , $job->id)}}">
                                        Accept The Offer
                                    </a>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <h4 class="mb-4 btn btn-outline-primary">
                                <i class="fa fa-check"></i>&nbsp;
                                YOU HAVE APPLIED TO THIS JOB
                            </h4>
                        </div>
                        <div class="">
                            <h4 class="mb-4">

                                <a href="{{ route('employee.candidacy.order.index', $job->id) }}">
                                    Want toreco mmend other candidates for this job?
                                </a>
                            </h4>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Published On: {{ $job->created_at }}
                        </p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Working Hours:
                            {{ $job->working_hours }}
                        </p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Working Days: {{ $job->working_days }}
                        </p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Salary: {{ $job->salary }}$</p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>OFF Day: {{ $job->off_day }}</p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Quantiy: {{ $job->quantity }}</p>
                        </p>
                    </div>
                    {{-- <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">I&nbsp;&nbsp;psum dolor ipsum accusam stet et et diam dolores, sed rebum
                            sadipscing
                            elitr vero dolores.
                            Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est
                            ipsum lorem
                            diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

    <!-- Button trigger modal -->

    <!-- Refuse Offer Modal -->
    <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Refuse The Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tell Us the Reason? (optional)
                    <form action="{{ route('employee.job.refuse', $job->id) }}" method="POST">
                        @csrf
                        <textarea class="form-control" name="note"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Send Note  Modal -->
    <div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send a Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Help Us Improve the Quality of Job Post.Tell Us Anything that can help us:
                    <form action="{{ route('employee.job.note.create', $job->id) }}" method="POST">
                        @csrf
                        <textarea class="form-control" required name="note"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    {{-- Accept The Offer --}}
    {{-- <div class="modal fade" id="exampleModal_3" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Application:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employee.application.create', $job->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">CV:</label>
                            <input type="file" class="form-control" name="cv">
                        </div>
                        <div class="form-group">
                            <label for="">Cover Letter:</label>
                            <textarea class="form-control" required name="cover_letter"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="prev_cv_checked" id="">
                            <label>Use My Previously Uploaded CV.</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}




</div>

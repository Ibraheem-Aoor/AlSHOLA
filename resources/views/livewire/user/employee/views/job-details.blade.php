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
                            <span class="text-truncate me-0"><i class="fa fa-sun text-primary me-2"></i>
                                {{ $job->status }}
                            </span>&nbsp;&nbsp;
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
                                @isset($job->accommodation_amount)
                                    <div class="col-sm-6">
                                        <h4>Accommodation Amount:</h4>
                                        <p class="mb-3">&nbsp;&nbsp;{{ $job->accommodation_amount }}</p>
                                    </div>
                                @endisset
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
                                    <h4>Country Entry Requirments If Any:</h4>
                                    <p class="mb-3">{{ $job->covid_test }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Cindemnity, leave, and overtime salary:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->covid_test }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Food:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->food }}</p>
                                </div>
                                @isset($job->food_amount)
                                    <div class="col-sm-6">
                                        <h4>Food Amount:</h4>
                                        <p class="mb-3">&nbsp;&nbsp;{{ $job->food_amount }}</p>
                                    </div>
                                @endisset
                                <div class="col-sm-6">
                                    <h4>Gender Prefrences:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->gender_prefrences }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Age Limit:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->age_limit }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Transport:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->transport }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Joining Ticket:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->joining_ticket }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>Return Ticket:</h4>
                                    <p class="mb-3">&nbsp;&nbsp;{{ $job->return_ticket }}</p>
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
                            <div></div>
                            <div class="row">
                                <h3>Avilable Demand Positions:</h3>
                                {{-- Job Positions --}}
                                <div class="col-sm-12 text-center">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Salary</th>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">Nationlaity</th>
                                                    <th scope="col">Descreption</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @forelse ($job->subJobs as $subjob)
                                                    <tr>
                                                        <th scope="row">{{ $i++ }}</th>
                                                        <td>{{ $subjob->title->name }}</td>
                                                        <td>{{ $subjob->salary }}</td>
                                                        <td>{{ $subjob->quantity }}</td>
                                                        <td>{{ $subjob->nationality->name }}</td>
                                                        <td>{{ Str::limit($subjob->description, 35, '...') }}
                                                        </td>
                                                        <td>
                                                            <a data-desc="{{ $subjob->description }}"
                                                                data-toggle="modal" href="#descmodal">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="alert alert-warning text-center bg-dark"
                                                            style="color:#fff">
                                                            No Records Yet
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                <tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Published On:
                            {{ $job->created_at }}
                        </p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Working Hours:
                            {{ $job->working_hours }}
                        </p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Working Days:
                            {{ $job->working_days }}
                        </p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>OFF Day:
                            {{ $job->off_day }}</p>
                        <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Total Quantity:
                            {{ $job->qty() }}</p>
                        </p>
                    </div>
                </div>
                <div class="">

                    <h4 class="mb-4">What You want to do?</h4>
                    <div class="row g-3">
                        <div class="col-12 col-sm-12">
                            {{-- If the agent has submited an application so he cant refuse the demand again. --}}
                            @if (!$hasApplication)
                                <button type="button" class="btn btn-outline-warning col-sm-12 mb-2"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal_1">Refuse The Demand
                                </button>
                            @endif
                            <button type="button" class="btn btn-outline-info col-sm-12 mb-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal_2">
                                Send a comment
                            </button>
                            @if ($hasApplication)
                                @php
                                    $txt = 'Submit Another Application';
                                @endphp
                            @else
                                @php
                                    $txt = 'Accept Demand & Terms & Conditions';
                                @endphp
                            @endif
                            <a class="btn btn-outline-success col-sm-12 mb-2"
                                href="{{ route('employee.application.form', $job->id) }}">
                                {{ $txt }}
                            </a>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Job Detail End -->

<!-- Button trigger modal -->

<!-- Refuse Offer Modal -->
<div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Refuse The Offer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('employee.job.refuse', $job->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="">Due to:</label>
                    <select name="refuseReason" class="form-control">
                        <option value="Low Quantity">Low Quantity</option>
                        <option value="Low Salary">Low Salary</option>
                        <option value="Client Name in the Market">Client Name in the Market</option>
                        <option value="Title position are not available">Title position are not available</option>
                        <option value="Service Charge ">Service Charge </option>
                        <option value="Advertisement Cost ">Advertisement Cost </option>
                        <option value="Trad Test Cost">Trad Test Cost</option>
                        <option value="Join Air Ticket">Join Air Ticket</option>
                        <option value="other">Other</option>
                    </select>
                    <br>
                    <textarea class="form-control" id="other_reason" name="other_reason" name="other_reason"
                        placeholder="Tell Us The Resaon"></textarea>
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
<div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<!-- subjob descreption Modal -->
<div class="modal fade" id="descmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Job Descreption</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea name="" id="desc" readonly name="desc" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End subjob descreption modal --}}




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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            // $('textarea[name="other_reason"]').removeAttr('name');
            $('#other_reason').hide();
            $('select[name="refuseReason"]').on('change', function() {
                if ($(this).val() == 'other') {
                    $('#other_reason').show();
                } else {
                    $('#other_reason').hide();
                    $('#other_reason').removeAttr('name');
                }

            })
        });

        $('#exampleModal_5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var message = button.data('message')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #message').val(message);
        });
        $('#descmodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var desc = button.data('desc')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #desc').val(desc);
        });
    </script>
@endpush

</div>

<div>
    @push('css')
        <style>
            table {
                font-size: 0.8rem;
            }

            .titles tr {
                background-color: #00B074;
                color: #ffff;
            }

            .titles th {
                background-color: #d8e8a7;
            }

            .basicInfo tr td:nth-child(even) {
                background-color: #00B074;
                color: #ffff;

            }
        </style>
    @endpush
    @section('title', 'title')
    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="container">
                            <div class="row">
                                <table class="table table-striped titles">
                                    <tr>
                                        <th>Categorey</th>
                                        <th>Title</th>
                                        <th>Quantity</th>
                                        <th>Salary</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Nationality</th>
                                    </tr>
                                    @forelse ($job->subJobs as $subjob)
                                        <tr>
                                            <td>{{ $subjob->title->sector->name }}</td>
                                            <td>{{ $subjob->title->name }}</td>
                                            <td>{{ $subjob->quantity }}</td>
                                            <td>{{ $subjob->salary }}</td>
                                            <td>{{ $subjob->gender }}</td>
                                            <td>{{ $subjob->age }}</td>
                                            <td>{{ $subjob->nationality->name }}</td>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </table>
                                <br>
                                <table class="table table-striped basicInfo">
                                    <tr>
                                        <td>Currency:</td>
                                        <td>{{ $job->currency }}</td>
                                    </tr>

                                    <tr>
                                        <td>Working Days:</td>
                                        <td>{{ $job->working_days }}</td>
                                    </tr>

                                    <tr>
                                        <td>Off Day:</td>
                                        <td>{{ $job->off_day }}</td>
                                    </tr>

                                    <tr>
                                        <td>Working Hours:</td>
                                        <td>{{ $job->working_hours }}</td>
                                    </tr>

                                    <tr>
                                        <td>Overtime: </td>
                                        <td>As Per Labour Law</td>
                                    </tr>

                                    <tr>
                                        <td>Food Allowance: </td>
                                        <td>{{ $job->food }} @if ($job->food_amount)
                                                {{ ' | ' . $job->food_amount }}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Contract Period: </td>
                                        <td>{{ $job->contract_period }}</td>
                                    </tr>

                                    <tr>
                                        <td>Joining Ticket: </td>
                                        <td>{{ $job->joining_ticket }}</td>
                                    </tr>

                                    <tr>
                                        <td>Return Ticket: </td>
                                        <td>{{ $job->return_ticket }}</td>
                                    </tr>

                                    <tr>
                                        <td>Annual Leave: </td>
                                        <td>{{ $job->annual_leave }}</td>
                                    </tr>


                                    <tr>
                                        <td>Medical Insurance: </td>
                                        <td>{{ $job->medical }}</td>
                                    </tr>

                                    <tr>
                                        <td>Transport</td>
                                        <td>{{ $job->transport }}</td>
                                    </tr>


                                    <tr>
                                        <td>Accommodation: </td>
                                        <td>{{ $job->accommodation }} @if ($job->accommodation_amount)
                                                {{ ' | ' . $job->accommodation_amount }}
                                            @endif
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            Country Entry requirements if any:
                                        </td>

                                        <td>
                                            Employer is liable for any additional fees, imposed by
                                            official authorities
                                            inside employer country
                                        </td>

                                    </tr>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:
                            {{ $job->created_at }}
                        </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Working Hours:
                            {{ $job->working_hours }}
                        </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Working Days:
                            {{ $job->working_days }}
                        </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>OFF Day:
                            {{ $job->off_day }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Total Quantity:
                            {{ $job->qty() }}</p>
                        </p>
                        <br>
                        <p>
                            <a href="{{ route('job.pdf.generate', $job->id) }}" class="btn btn-outline-success"><i
                                    class="fa fa-download"></i> Download PDF</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">file name</th>
                                <th scope="col">file type</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">creation_date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($job->attachments as $attachment)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $attachment->name }}</td>
                                    <td>{{ $attachment->type }}</td>
                                    <td>{{ $attachment->user->name . ' ( ' . $attachment->user->type . ' )' }}
                                    </td>
                                    <td>{{ $attachment->created_at }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('job.attachment.download', ['jobId' => $job->id, 'fileName' => $attachment->name]) }}"><i
                                                class="fa fa-download"></i></a>

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
                        </tbody>
                    </table>
                </div>
                @isset($job->description)
                    <div class="col-sm-12 mt-4">
                        <label for="">Demand Description:</label>
                        <textarea cols="30" rows="10" class="form-control" style="height:150px;" readonly>{{ $job->description }}</textarea>
                    </div>
                @endisset
            </div>
            <div class="">

                @if ($job->subStatus->name != 'Demand Cancelled' && $job->subStatus->name != 'Demand Complete')
                    <h4 class="mb-4 mt-4">What You want to do?</h4>
                    <div class="row g-3">
                        <div class="col-12 col-sm-12">
                            {{-- If the agent has submited an application so he cant refuse the demand again. --}}
                            @if ($hasApplication == 0)
                                <button type="button" class="btn btn-outline-warning col-sm-12 mb-2"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal_1">Refuse The Demand
                                </button>
                            @endif
                            <button type="button" class="btn btn-outline-info col-sm-12 mb-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal_2">
                                Send a comment
                            </button>
                            @if ($hasApplication > 0)
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

                @endif
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
                    <textarea class="form-control" id="other_reason" name="other_reason" placeholder="Tell Us The Resaon"
                        style="display: none;"></textarea>

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
            <form action="{{ route('employee.job.note.create', $job->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    Help Us Improve the Quality of Demand Post.Tell Us Anything that can help us:
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
                <textarea name="" id="desc" readonly name="desc" cols="30" rows="10"
                    class="form-control"></textarea>
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
                var otherReason = $(this).val();
                if (otherReason == 'other') {
                    $('#other_reason').show();
                } else {
                    $('#other_reason').hide();
                    $('#other_reason').removeAttribute('name');
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

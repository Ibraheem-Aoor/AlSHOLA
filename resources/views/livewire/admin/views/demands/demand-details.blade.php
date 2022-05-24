<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Demand Details</strong><small> status: {{ $job->status }}</small>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">General Information</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-descreption" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Descreption And Terms</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-applications" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Application</a>
                                        {{-- <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-actions" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Actions</a> --}}
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="inputEmail3" class="">DSR:</label>
                                                    <input type="text" value="{{ $job->post_number }}"
                                                        class="form-control" id="inputEmail3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputEmail3" class="">Agent Name:</label>
                                                    <input type="text" value="{{ $job->user->name }}"
                                                        class="form-control" id="inputEmail3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputEmail3" class="">Job
                                                        Category:</label>
                                                    <input type="text" value="{{ $job->title->sector->name }}"
                                                        class="form-control" id="inputEmail3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Title:</label>
                                                    <input type="text" value="{{ $job->title->name }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Quantity:</label>
                                                    <input type="text" value="{{ $job->quantity }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Salary:</label>
                                                    <input type="text" value="{{ $job->salary }}$"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3"
                                                        class="col-form-label">contract_period:</label>
                                                    <input type="text" value="{{ $job->contract_period }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3"
                                                        class="col-form-label">working_hours:</label>
                                                    <input type="text" value="{{ $job->working_hours }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3"
                                                        class="col-form-label">working_days:</label>
                                                    <input type="text" value="{{ $job->working_days }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">off_day:</label>
                                                    <input type="text" value="{{ $job->off_day }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3"
                                                        class="col-form-label">Transport:</label>

                                                    <input type="text" value="{{ $job->transport }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Medical:
                                                    </label>
                                                    <input type="text" value="{{ $job->medical }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3"
                                                        class="col-form-label">insurance:</label>
                                                    <input type="text" value="{{ $job->insurance }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Food:</label>
                                                    <input type="text" value="{{ $job->food }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Annual
                                                        Leave:</label>
                                                    <input type="text" value="{{ $job->annual_leave }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Air
                                                        Ticket:</label>
                                                    <input type="text" value="{{ $job->air_ticket }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">
                                                        Indemnity Leave and Overtime Salary:</label>
                                                    <input type="text"
                                                        value="{{ $job->indemnity_leave_and_overtime_salary }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Covid
                                                        Test:</label>
                                                    <input type="text" value="{{ $job->covid_test }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>


                                                @isset($job->age)
                                                    <div class="col-sm-4">
                                                        <label for="inputPassword3" class="col-form-label">age:</label>
                                                        <input type="text" value="{{ $job->age }}"
                                                            class="form-control" id="inputPassword3" readonly>
                                                    </div>
                                                @endisset

                                                @isset($job->requested_by)
                                                    <div class="col-sm-4">
                                                        <label for="inputPassword3"
                                                            class="col-form-label">requested_by:</label>
                                                        <input type="text" value="{{ $job->requested_by }}"
                                                            class="form-control" id="inputPassword3" readonly>
                                                    </div>
                                                @endisset


                                                @isset($job->sex)
                                                    <div class="col-sm-4">
                                                        <label for="inputPassword3" class="col-form-label">sex:</label>
                                                        <input type="text" value="{{ $job->sex }}"
                                                            class="form-control" id="inputPassword3" readonly>
                                                    </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Languages Levels --}}
                                    <div class="tab-pane fade" id="custom-nav-descreption" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label for="">Descreption</label>
                                                <textarea readonly class="form-control" id="" cols="30" rows="10">{{ $job->description }}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Other Terms and Conditions</label>
                                                <textarea readonly class="form-control" id="" cols="30" rows="10">{{ $job->other_terms }}
                                                </textarea>
                                            </div>
                                        </div>
                                        </p>
                                    </div>

                                    {{-- Notes --}}
                                    <div class="tab-pane fade" id="custom-nav-applications" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 ">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Agent Name</th>
                                                            <th scope="col">contact_no</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">creation_date</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @forelse ($applications as $application)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>
                                                                    {{ $application->user->name }}
                                                                </td>
                                                                <td>
                                                                    {{ $application->contact_no }}
                                                                </td>
                                                                <td>
                                                                    {{ $application->status }}
                                                                </td>
                                                                <td>{{ $application->created_at }}</td>
                                                                <td>
                                                                    <a
                                                                        href="{{ route('admin.application.details', $application->id) }}">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="alert alert-warning  bg-dark"
                                                                    style="color:#fff">
                                                                    No Records Yet
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </p>
                                    </div>

                                    {{-- Status History
                                    <div class="tab-pane fade" id="custom-nav-history" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 ">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">From</th>
                                                            <th scope="col">To</th>
                                                            <th scope="col">Changed By</th>
                                                            <th scope="col">Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @forelse ($job->statusHistory->sortByDesc('id') as $record)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $record->prev_status }}</td>
                                                                <td>{{ $record->status }}</td>
                                                                <td>{{ $record->user->name }}</td>
                                                                <td>{{ $record->created_at }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="alert alert-warning  bg-dark"
                                                                    style="color:#fff">
                                                                    No Records Yet
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </p>
                                    </div> --}}



                                    {{-- Employer Experince --}}

                                    {{-- <div class="tab-pane fade" id="custom-nav-employers" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 ">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Employer Name</th>
                                                            <th scope="col">Duration</th>
                                                            <th scope="col">Country</th>
                                                            <th scope="col">Designation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @forelse ($job->employers as $emplyoer)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $emplyoer->name }}</td>
                                                                <td>{{ $emplyoer->duration }}</td>
                                                                <td>{{ $emplyoer->country }}</td>
                                                                <td>{{ $emplyoer->designation }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="alert alert-warning  bg-dark"
                                                                    style="color:#fff">
                                                                    No Records Yet
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </p>
                                    </div> --}}




                                    {{-- <div class="tab-pane fade" id="custom-nav-actions" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Actions:</label><br>
                                            <a class="btn btn-success col-sm-12 mb-2"
                                                wire:click="passjobToEmployer()">Forward To Client</a>
                                            <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal">
                                                Send a Note </a>
                                            <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal_8">
                                                Change Status</a>
                                        </div>
                                        </p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <!--
                            Modal_1
                            This modal is for sending notes
                        -->


                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            wire:ignore aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Write A Note:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="sendjobNote()">
                                            <div class="form-group">
                                                <label for="">Note<span class="text-danger">* </span> :</label>
                                                <textarea class="form-control" required wire:model.lazy="note"></textarea>
                                                @error('note')
                                                    <span class="text-dagner">{{ $message }}</span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send Note</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <!--SHOW NOTE  Modal -->
                        <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message:</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea class="form-control" id="message" cols="30" rows="10" readonly></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Change status modal Modal -->
                        <div class="modal fade" id="exampleModal_8" tabindex="-1" wire:ignore
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ٍjob Status:</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form wire:submit.preventDefault="changeStatus()">
                                        <div class="modal-body">
                                            <select wire:model="status" class="form-control">
                                                <option value="waiting for medical">waiting for medical</option>
                                                <option value="waiting for visa">waiting for visa</option>
                                                <option value="CV Submitted">CV Submitted</option>
                                                <option value="For Selection">For Selection</option>
                                                <option value="waiting for interview">waiting for interview</option>
                                                <option value="cancelled">cancelled</option>
                                                <option value="active">active</option>
                                                <option value="hold">hold</option>
                                                <option value="completed">completed</option>
                                                <option value="Arrival Scheduled">Arrival Scheduled</option>
                                                <option value="LMRA Process">LMRA Process</option>
                                                <option value="Ready for Payment">Ready for Payment</option>
                                                <option value="Embassy">Embassy</option>
                                                <option value="Emigrate Process">Emigrate Process</option>
                                                <option value="To Be Arrived">To Be Arrived</option>
                                                <option value="Arrived">Arrived</option>
                                                <option value="Arrival Scheduled">Arrival Scheduled</option>
                                                <option value="For Exited">For Exited</option>
                                                <option value="Exited">Exited</option>
                                                <option value="Worker Refuse to Work">Worker Refuse to Work</option>
                                                <option value="UNFIT">UNFIT</option>
                                                <option value="Runaway">Runaway</option>
                                                <option value="For Local Transfer">For Local Transfer</option>
                                                <option value="Canceled job">Canceled job</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Change</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>

        <script>
            $('#exampleModal_5').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var message = button.data('message')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #message').val(message);
            });
        </script>
    @endpush
</div>

<div>
    @push('css')
        <style>
            table {
                font-size: 0.8rem;
            }

            .titles tr:nth-child(even) {
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
                                            href="#custom-nav-descreption" role="tab"
                                            aria-controls="custom-nav-home" aria-selected="false">Other Terms</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-titles" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Avilable Positions</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-attachments" role="tab"
                                            aria-controls="custom-nav-home" aria-selected="false">Attachment</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            aria-selected="false" href="#custom-nav-notes" role="tab"
                                            aria-controls="custom-nav-home">Notes<span class="text-danger">
                                                @if ($unreadNotes)
                                                    {{ '( ' . $unreadNotes . ' )' }}
                                                @endif
                                            </span></a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            aria-selected="false" href="#custom-nav-refused" role="tab"
                                            aria-controls="custom-nav-home">Refused
                                        </a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-applications" role="tab"
                                            aria-controls="custom-nav-home" aria-selected="false">Application</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-actions" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Actions</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">
                                        <div class="container">
                                            {{-- <div class="row">
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
                                                    <input type="text"
                                                        value="{{ $job->subJobs->first()->title->sector->name }}"
                                                        class="form-control" id="inputEmail3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Title:</label>
                                                    <input type="text"
                                                        value="{{ $job->subJobs->first()->title->name }}"
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
                                                @isset($job->food_amount)
                                                    <div class="col-sm-4">
                                                        <label for="inputPassword3" class="col-form-label">Food
                                                            Amount:</label>
                                                        <input type="text" value="{{ $job->food_amount }}"
                                                            class="form-control" id="inputPassword3" readonly>
                                                    </div>
                                                @endisset

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3"
                                                        class="col-form-label">Accomodation:</label>
                                                    <input type="text" value="{{ $job->accommodation }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                @isset($job->accommodation_amount)
                                                    <div class="col-sm-4">
                                                        <label for="inputPassword3" class="col-form-label">Accommodation
                                                            Amount:</label>
                                                        <input type="text" value="{{ $job->accommodation_amount }}"
                                                            class="form-control" id="inputPassword3" readonly>
                                                    </div>
                                                @endisset

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Annual
                                                        Leave:</label>
                                                    <input type="text" value="{{ $job->annual_leave }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Joining
                                                        Ticket:</label>
                                                    <input type="text" value="{{ $job->joining_ticket }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Return
                                                        Ticket:</label>
                                                    <input type="text" value="{{ $job->return_ticket }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Gender
                                                        Prefrences:</label>
                                                    <input type="text" value="{{ $job->gender_prefrences }}"
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
                                                    <label for="inputPassword3" class="col-form-label">Age
                                                        Limit:</label>
                                                    <input type="text" value="{{ $job->age_limit }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-12">
                                                    <label for="inputPassword3" class="col-form-label">Country Entry
                                                        Requirments If Any:</label>
                                                    <input type="text" value="{{ $job->covid_test }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>



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
                                            </div> --}}

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

                                    {{-- Other Temrs --}}
                                    <div class="tab-pane fade" id="custom-nav-descreption" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label for="">Other Terms and Conditions</label>
                                                <textarea readonly class="form-control" id="" cols="30" rows="10">{{ $job->other_terms }}
                                                </textarea>
                                            </div>
                                        </div>
                                        </p>
                                    </div>



                                    {{-- Job Positions --}}
                                    <div class="tab-pane fade" id="custom-nav-titles" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
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
                                                                    <a data-toggle="modal"
                                                                        data-desc="{{ $subjob->description }}"
                                                                        href="#descmodal">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"
                                                                    class="alert alert-warning text-center bg-dark"
                                                                    style="color:#fff">
                                                                    No Records Yet
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                        <tr>
                                                            <td><span class="text-danger">Submission Date</span>:
                                                                {{ $job->created_at }}</td>
                                                            <td><span class="text-danger">Total QTY</span>:
                                                                {{ $job->qty() }}</td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                        </p>
                                    </div>




                                    {{-- Attachments --}}
                                    <div class="tab-pane fade" id="custom-nav-attachments" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 text-center">
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
                                                                        href="{{ route('file.download', ['jobId' => $job->id, 'fileName' => $attachment->name]) }}"><i
                                                                            class="fa fa-download"></i></a>
                                                                    <a class="btn btn-outline-danger"
                                                                        href="{{ route('file.delete', ['jobId' => $job->id, 'fileName' => $attachment->name]) }}"><i
                                                                            class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"
                                                                    class="alert alert-warning text-center bg-dark"
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


                                    {{-- Notes --}}
                                    <div class="tab-pane fade" id="custom-nav-notes" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 text-center">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">User Name</th>
                                                            <th scope="col">message</th>
                                                            <th scope="col">date</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @forelse ($job->notes as $note)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $note->user->name . ' ( ' . $note->user->type . ' )' }}
                                                                </td>
                                                                <td>{{ Str::limit($note->message, 40, '..') }}</td>
                                                                <td>{{ $note->created_at }}
                                                                </td>
                                                                <td>{{ $note->created_at }}</td>
                                                                <td>
                                                                    <a class="btn btn-outline-info"
                                                                        data-message="{{ $note->message }}"
                                                                        data-toggle="modal" href="#exampleModal_5"
                                                                        wire:click="setReadNote('{{ $note->id }}')"><i
                                                                            class="fa fa-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"
                                                                    class="alert alert-warning text-center bg-dark"
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


                                    {{-- Refused Times --}}
                                    <div class="tab-pane fade" id="custom-nav-refused" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 text-center">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Agent Name</th>
                                                            <th scope="col">Reason</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @forelse ($job->refuseTimes as $refuse)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $refuse->user->name }}
                                                                </td>
                                                                <td>{{ Str::limit($refuse->reason, 40, '...') }}</td>
                                                                <td>{{ $refuse->created_at }}
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-outline-info"
                                                                        data-message="{{ $refuse->reason }}"
                                                                        data-toggle="modal" href="#exampleModal_5"><i
                                                                            class="fa fa-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"
                                                                    class="alert alert-warning text-center bg-dark"
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




                                    {{-- Applications --}}
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
                                                                    {{ $application->mainStatus->name }}
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
                                                                <td colspan="6"
                                                                    class="alert alert-warning  bg-dark text-center"
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




                                    <div class="tab-pane fade" id="custom-nav-actions" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Actions:</label><br>
                                            <a class="btn btn-outline-success col-sm-12 mb-2"
                                                href="{{ route('admin.send-job-to-agent', $job->id) }}">Forward To
                                                Agent</a>
                                            <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal">
                                                Send a Note </a>

                                            <a data-toggle="modal" href="#exampleModal_8"
                                                class="btn btn-secondary col-sm-12 mb-2">Change Demand Status</a>

                                            <a href="{{ route('admin.pdf.generate', $job->id) }}"
                                                class="btn btn-outline-info col-sm-12 mb-2">PRINT PDF</a>

                                            <a title="issue" data-toggle="modal" href="#exampleModal_115"
                                                class="btn btn-info col-sm-12"><i class="fa fa-money"></i> ISSUE
                                                INVOICE</a>
                                            {{-- <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal_8">
                                                Change Status</a> --}}
                                        </div>
                                        </p>
                                    </div>
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
                                                <label for="">Note<span class="text-danger">* </span>
                                                    :</label>
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

                        <!-- subjob descreption Modal -->
                        <div class="modal fade" id="descmodal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Job Descreption</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea name="" id="desc" readonly name="desc" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End subjob descreption modal --}}

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
                                    <form method="POST"
                                        action="{{ route('admin.demand.chane-status', $job->id) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <select name="status" class="form-control">
                                                <option value="cancelled">cancelled</option>
                                                <option value="active">active</option>
                                                <option value="completed">completed</option>
                                                <option value="pending">pending</option>
                                                <option value="Demand Submitted">Demand Submitted</option>
                                                <option value="Demand Accepted">Demand Accepted</option>
                                                <option value="Demand Under Process">Demand Under Process</option>
                                                <option value="Demand Completed">Demand Completed</option>
                                                <option value="Demand Canceled">Demand Canceled</option>
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





                        <!-- INVOICE Modal -->
                        <div class="modal fade" id="exampleModal_115" tabindex="-1" wire:ignore
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
                                    <form action="{{ route('invoice.test') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <select class="form-control">
                                                <option value="">-- select one --</option>
                                                @foreach ($job->applications->pluck('user')->unique() as $user)
                                                    <option value="{{ $application->user->id }}">
                                                        {{ $application->user->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" placeholder="VAT" class="form-control"
                                                name="vat"> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">ISSUE INVOICE</button>
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
            $('#descmodal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var desc = button.data('desc')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #desc').val(desc);
            });
        </script>

        <script>
            $('#exampleModal_115').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var job = button.data('job')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #job').val(job);
            });
        </script>
    @endpush
</div>

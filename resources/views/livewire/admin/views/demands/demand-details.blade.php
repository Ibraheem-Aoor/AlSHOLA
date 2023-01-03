<div>
    @push('css')
        <style>
             table {
                font-size: 0.8rem;
            }

            .titles tr:nth-child(even) {
                background-color: lightblue;
                color: #ffff;
            }

            .titles th {
                background-color: red;
            }

            .basicInfo tr td:nth-child(even) {
                background-color: lightblue;
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
                            <strong>Demand Details</strong><small> status: {{ $job->subStatus->name }}</small>
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
                                            aria-controls="custom-nav-home" aria-selected="false">Description</a>
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

                                            <div class="row">
                                                <table class="table table-striped titles">
                                                    <tr>
                                                   
                                                        <th>Title</th>
                                                        <th>Quantity</th>
                                                        <th>Salary</th>
                                                        <th>Gender</th>
                                                        <th>Age</th>
                                                        <th>Nationality</th>
                                                    </tr>
                                                    @forelse ($job->subJobs as $subjob)
                                                        <tr>

                                                            <td>{{ $subjob->title->name }}</td>
                                                            <td>{{ $subjob->quantity }}</td>
                                                            <td>{{ $subjob->salary . ' ( ' . $job->currency . ' )' }}
                                                            </td>
                                                            <td>{{ $subjob->gender }}</td>
                                                            <td>{{ $subjob->age }}</td>
                                                            <td>{{ $subjob->nationality->name }}</td>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </table>
                                                <br>
                                                <table class="table table-striped  basicInfo">

                                                    <tr>
                                                        <td>Client:</td>
                                                        <td>{{ $job->user->name }}</td>
                                                    </tr>
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
                                                        <td>Indemnity: </td>
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
                                                            official authorities inside employer country
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
                                            @isset($job->other_terms)
                                                <div class="form-group">
                                                    <label for="">Other Terms and Conditions</label>
                                                    <textarea readonly class="form-control" id="" cols="30" rows="10">{{ $job->other_terms }}
                                                </textarea>
                                                </div>
                                            @endisset

                                            @isset($job->description)
                                                <div class="form-group">
                                                    <label for="">General Description</label>
                                                    <textarea readonly class="form-control" id="" cols="30" rows="10">{{ $job->description }}
                                                </textarea>
                                                </div>
                                            @endisset
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
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Age</th>
                                                            <th scope="col">Nationlaity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @php
                                                            $subJobs = $job
                                                                ->subJobs()
                                                                ->orderBy('created_at', 'desc')
                                                                ->paginate(10);
                                                        @endphp
                                                        @forelse ($subJobs as $subjob)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $subjob->title->name }}</td>
                                                                <td>{{ $subjob->salary . ' ( ' . $job->currency . ' )' }}
                                                                </td>
                                                                <td>{{ $subjob->quantity }}</td>
                                                                <td>{{ $subjob->gender }}</td>
                                                                <td>{{ $subjob->age }}</td>
                                                                <td>{{ $subjob->nationality->name }}</td>
                                                                <td>{{ Str::limit($subjob->description, 35, '...') }}
                                                                </td>
                                                                {{-- <td>
                                                                    <a data-toggle="modal"
                                                                        data-desc="{{ $subjob->description }}"
                                                                        href="#descmodal">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </td> --}}
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
                                                    <tfoot>
                                                        <tr>
                                                            <td><span class="text-danger">Submission Date</span>:
                                                                {{ \Carbon\Carbon::parse($job->created_at)->format('Y-M-d') }}</td>
                                                            <td><span class="text-danger">Total QTY</span>:
                                                                {{ $job->qty() }}</td>
                                                        </tr>
                                                    </tfoot>

                                                </table>
                                                {!! $subJobs->fragment('custom-nav-titles')->links() !!}
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
                                                        @php
                                                            $attachments = $job
                                                                ->attachments()
                                                                ->orderBy('created_at', 'desc')
                                                                ->paginate(10);
                                                        @endphp
                                                        @forelse ($attachments as $attachment)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $attachment->name }}</td>
                                                                <td>{{ $attachment->type }}</td>
                                                                <td>{{ $attachment->user->name . ' ( ' . $attachment->user->type . ' )' }}
                                                                </td>
                                                                <td>{{ \Carbon\Carbon::parse($attachment->created_at)->format('Y-M-d')}}</td>
                                                                <td>
                                                                    <a class="btn btn-outline-primary"
                                                                        href="{{ route('file.download', ['jobId' => $job->id, 'fileName' => $attachment->name]) }}"><i
                                                                            class="fa fa-download"></i></a>
                                                                    <a class="btn btn-outline-info"
                                                                        href="{{ route('file.view', ['jobId' => $job->id, 'fileName' => $attachment->name]) }}"><i
                                                                            class="fa fa-eye"></i></a>
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
                                                {!! $attachments->fragment('custom-nav-attachments')->links() !!}
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
                                                        @php
                                                            $notes = $job
                                                                ->notes()
                                                                ->orderBy('created_at', 'desc')
                                                                ->paginate(10);
                                                        @endphp
                                                        @forelse ($notes as $note)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $note->user->name . ' ( ' . $note->user->type . ' )' }}
                                                                </td>
                                                                <td>{{ Str::limit($note->message, 40, '..') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($note->created_at)->format('Y-M-d') }}
                                                                </td>
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
                                                {!! $notes->fragment('custom-nav-notes')->links() !!}
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
                                                        @php
                                                            $refuseTimes = $job
                                                                ->refuseTimes()
                                                                ->orderBy('created_at', 'desc')
                                                                ->paginate(10);
                                                        @endphp
                                                        @forelse ($refuseTimes as $refuse)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $refuse->user->name }}
                                                                </td>
                                                                <td>{{ Str::limit($refuse->reason, 40, '...') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($refuse->created_at)->format('Y-M-d')}}
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
                                                {!! $refuseTimes->fragment('custom-nav-refused')->links() !!}
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
                                                                <td>{{ \Carbon\Carbon::parse($application->created_at)->format('Y-M-d')}}</td>
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
                                                {!! $applications->fragment('custom-nav-applications')->links() !!}
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
                                                        @forelse ($job->subStatus->nameHistory->sortByDesc('id') as $record)
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
                                            @if ($job->subStatus->name != 'Demand Cancelled' && $job->subStatus->name != 'Demand Complete')
                                                <a class="btn btn-outline-success col-sm-12 mb-2"
                                                    href="{{ route('admin.send-job-to-agent', $job->id) }}">Forward
                                                    To
                                                    Agent</a>
                                            @endif
                                            <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal">
                                                Send a Note </a>

                                            <a href="{{ route('brokers.assign', $job->id) }}"
                                                class="btn btn-secondary col-sm-12 mb-2">Assign To Coordinator</a>

                                            <a data-toggle="modal" href="#exampleModal_8"
                                                class="btn btn-secondary col-sm-12 mb-2">Change Demand Status</a>

                                            <a href="{{ route('admin.pdf.generate', $job->id) }}"
                                                class="btn btn-outline-info col-sm-12 mb-2">PRINT PDF</a>

                                            <a title="issue" data-toggle="modal" data-job="{{ $job->id }}"
                                                title="Issue Invoice" href="#exampleModal_115"
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
                                            class="form-control">{{ $job->description }}</textarea>
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

                                    <form method="POST" action="{{ route('admin.demand.chane-status', $job->id) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select name="mainStatus" id="mainStatus" class="form-control"
                                                    required>
                                                    <option value="">--select one --</option>
                                                    @foreach ($mainStatuses as $status)
                                                        <option value="{{ $status->id }}">
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-gorup">

                                                <select name="subStatus" class="form-control" id="subStatus"
                                                    required>
                                                    <option value="">--select one --</option>

                                                </select>

                                            </div>
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
                                    <form action="{{ route('admin.invoice.select-payer') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="text" id="job" name="job_id" hidden>
                                            <label for="">Issue To:</label>
                                            <select name="payer" class="form-control">
                                                <option value="">-- select one --</option>
                                                <option value="client">Client</option>
                                                <option value="agent">Agent</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Continue</button>
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
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $('select[name="mainStatus"]').on('change', function() {
                    var id = $(this).val();
                    if (id) {
                        $.ajax({
                            url: "{{ URL::to('admin/job/substatus') }}/" + id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="subStatus"]').empty();
                                $.each(data, function(key, value) { //for each loop
                                    $('select[name="subStatus"]').append('<option value="' +
                                        value.id + '" selected>' + value.name +
                                        '</option>');
                                });
                            },
                        });

                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {

                var url = document.location.toString();
                if (url.match('#')) {
                    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]')[0].click();
                }

                //To make sure that the page always goes to the top
                setTimeout(function() {
                    window.scrollTo(0, 0);
                }, 200);

            });
        </script>
    @endpush
</div>

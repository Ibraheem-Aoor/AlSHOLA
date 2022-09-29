@extends('layouts.user.employer.master')
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

    <style>
        table {
            font-family: arial, sans-serif;
            font-size: 10px;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #dddddd;
        }

        .fromDiv {
            width: 100%;
        }

        .fromDiv p {
            display: inline-block;
            margin: 0px 30px;
        }
    </style>
@endpush
@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <strong>Demand Details</strong><small> status: {{ $job->subStatus->name }}</small> --}}
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Case Information</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-application" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Application Information</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-messages" role="tab" aria-controls="custom-nav-messages"
                                            aria-selected="false">Messages</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-attachments" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Attachment</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-actions" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Actions</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                                    {{-- Start  Case Info --}}
                                    <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">
                                        <div class="container">

                                            <div class="row">
                                                <table class="table table-striped  basicInfo">

                                                    <tr>
                                                        <td>Case ID:</td>
                                                        <td>{{ $case->id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>{{ $case->status }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Application Ref</td>
                                                        <td>{{ $case->application->ref }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Full Name</td>
                                                        <td>{{ $case->application->full_name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Demand No.</td>
                                                        <td>{{ $case->application->job->post_number }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Contact Number.</td>
                                                        <td>{{ $case->contact_number }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Reason:</td>
                                                        <td>{{ $case->reason }}</td>
                                                    </tr>



                                                    @isset($case->other_reason)
                                                        <tr>
                                                            <td>Orher Reason:</td>
                                                            <td>
                                                                {{ $case->other_reason }}
                                                            </td>
                                                        </tr>
                                                    @endisset

                                                    @isset($case->details)
                                                        <tr>
                                                            <td>Details:</td>
                                                            <td>
                                                                {{ $case->details }}
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    <tr>
                                                        <td>Date:</td>
                                                        <td>{{ \Carbon\Carbon::parse($case->created_at)->format('Y-M-d') }}
                                                        </td>
                                                    </tr>

                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Case Info --}}


                                    {{-- Start Applications Info --}}

                                    <div class="tab-pane fade" id="custom-nav-application" role="tabpanel">

                                        <h3 class="text-center">Application Information</h3>
                                        <div style="background: #f7ff9c;width:100%" class="fromDiv mb-5 mt-2 text-center">
                                            <p>
                                                From: {{ $case->application->user->name }}
                                            </p>
                                            <p>
                                                E-mail: {{ $case->application->user->email }}
                                            </p>
                                            <p>
                                                Mobile: {{ $case->application->user->mobile }}
                                            </p>
                                        </div>
                                        <br>

                                        <div class="contiane">
                                            <div class="row">

                                                <div class="text-right">
                                                    @php
                                                        $photo = $case->application->attachments->where('type', 'Personal Photo')->first()->name;
                                                    @endphp
                                                    <img src="{{ asset('storage/uploads/applications/' . $case->application->id . '/attachments' . '/' . $photo) }}"
                                                        width="200" height="200"
                                                        style="margin-left:70%;border: 1px solid black;">
                                                </div>

                                                <div class="col-sm-">
                                                    <table style="margin-top: -150px" class="table table-responsive">
                                                        <tr>
                                                            <td>Ref: {{ $case->application->ref }}</td>
                                                            <td>Date:
                                                                {{ $case->application->job->created_at }}
                                                            </td>
                                                        </tr>
                                                        <tr></tr>

                                                        <tr>
                                                            <td>Full_Name:
                                                                {{ $case->application->full_name }}</td>
                                                            <td>
                                                                Position Applied For:
                                                                {{ $case->application->title->name }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address:
                                                                {{ $case->application->address }}</td>
                                                            <th>Contact_No:
                                                                {{ $case->application->contact_no }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Passport_No:
                                                                {{ $case->application->passport_no }}
                                                            </td>
                                                            <th>Nationality:
                                                                {{ $case->application->Nationlaity ?? 'UNKOWN' }}
                                                            </th>

                                                        </tr>


                                                        <tr id="tt">
                                                            <td>Place Issued:
                                                                {{ $case->application->place_issued }}
                                                            </td>
                                                            <td>Place Of Birth:
                                                                {{ $case->application->place_of_birth ?? 'UNKOWN' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date Issued:
                                                                {{ $case->application->date_issued }}
                                                            </td>
                                                            <td>Age: {{ $case->application->age }}</td>

                                                        </tr>

                                                        <tr>
                                                            <td>Expiry Dte:
                                                                {{ $case->application->expiry_issued }}
                                                            </td>
                                                            <td>Relegion:
                                                                {{ $case->application->relegion }}</td>
                                                            <td>Visa_Number:
                                                                {{ $case->application->visa_number ?? 'NONE' }}</td>
                                                            <td>flight_ticket:
                                                                {{ $case->application->flight_ticket ?? 'NONE' }}
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                        </tr>

                                                        <tr>

                                                            <td>status:
                                                                {{ $case->application->status }}</td>
                                                            <td>sex: {{ $case->application->sex }}</td>


                                                            <td>children:
                                                                {{ $case->application->children }}</td>
                                                            <td>height:
                                                                {{ $case->application->height }}</td>
                                                            <td>weight:
                                                                {{ $case->application->weight }}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Applications Info --}}



                                    {{-- Messages --}}
                                    <div class="tab-pane fade" id="custom-nav-messages" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 text-center">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Sender</th>
                                                            <th scope="col">Message</th>
                                                            <th scope="col">creation_date</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @php
                                                            $messages = $case
                                                                ->messages()
                                                                ->where('is_forwarded_employer', true)
                                                                ->orderBy('created_at', 'desc')
                                                                ->paginate(10);
                                                        @endphp
                                                        @forelse ($messages as $message)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $message->user->name . ' ( ' . $message->user->type . ' )' }}
                                                                <td>{{ Str::limit($message->message, 30, '...') }}
                                                                </td>
                                                                </td>
                                                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                                                <td>

                                                                    <a class="btn btn-outline-info" data-toggle="modal"
                                                                        data-message="{{ $message->message }}"
                                                                        href="#descmodal"><i class="fa fa-eye"></i></a>

                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6"
                                                                    class="alert alert-warning text-center b        g-dark"
                                                                    style="color:#fff">
                                                                    No Records Yet
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                                {!! $messages->fragment('custom-nav-attachments')->links() !!}
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                    {{-- End Attachments --}}




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
                                                            $attachments = $case
                                                                ->attachments()
                                                                ->where('is_forwarded_employer', true)
                                                                ->orderBy('created_at', 'desc')
                                                                ->paginate(10);
                                                        @endphp
                                                        @forelse ($attachments as $attachment)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $attachment->name }}</td>
                                                                <td>{{ $attachment->user->name . ' ( ' . $attachment->user->type . ' )' }}
                                                                </td>
                                                                <td>{{ $attachment->created_at }}</td>
                                                                <td>
                                                                    <a class="btn btn-outline-primary"
                                                                        href="{{ route('user.case.file.download', ['caseId' => $case->id, 'fileName' => $attachment->name]) }}"><i
                                                                            class="fa fa-download"></i></a>
                                                                    <a class="btn btn-outline-info"
                                                                        href="{{ route('user.case.file.view', ['caseId' => $case->id, 'fileName' => $attachment->name]) }}"><i
                                                                            class="fa fa-eye"></i></a>

                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6"
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
                                    {{-- End Attachments --}}

                                    {{-- Actions Tab --}}
                                    <div class="tab-pane fade" id="custom-nav-actions" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Actions:</label><br>
                                            @if ($case->status != 'Case Cancelled' && $case->status != 'Case Complete')
                                                {{-- <a class="btn btn-outline-success col-sm-12 mb-2"
                                            href="{{ route('admin.send-job-to-agent', $job->id) }}">Forward
                                            To
                                            Agent</a> --}}
                                            @endif

                                            <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal_5">
                                                Attach files</a>

                                            <a class="btn btn-outline-info col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal_10">
                                                <i class="fa fa-plus"></i>
                                                New Message </a>

                                            {{-- <a href="{{ route('admin.pdf.generate', $job->id) }}"
                                        class="btn btn-outline-info col-sm-12 mb-2">PRINT PDF</a> --}}
                                            {{-- <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                    href="#exampleModal_8">
                                    Change Status</a> --}}
                                        </div>
                                        </p>
                                    </div>
                                    {{-- End Actionns Tab --}}




                                </div>
                            </div>
                        </div>

                        <!--
                                                                                                                                    Modal_1
                                                                                                                                    This modal is for sending notes
                                                                                                                                -->




                    </div>
                </div>
            </div>







        </div>
    </div>
@endsection





<div class="modal fade" id="exampleModal_10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Write A Message:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employer.case.message', $case->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Message<span class="text-danger">*</span>
                            :</label>
                        <textarea class="form-control" required name="message"></textarea>
                        @error('message')
                            <span class="text-dagner">{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send Note</button>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- Show Message Modal  descreption Modal -->
<div class="modal fade" id="descmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Case Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div v>
            <div class="modal-body">
                <textarea name="" id="message" readonly name="desc" cols="30" rows="10"
                    class="form-control"></textarea>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Endsubjob descreption modal --}}




<!--ATTACH FILEs   Modal -->
<div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('employer.case.attach', $case->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="">Files</label>
                    <input type="file" name="attachments[]" multiple class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">ADD</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- END ATTACH FILES MODAL --}}



<!-- Change status modal Modal -->
<div class="modal fade" id="exampleModal_8" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ٍjob Status:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.case.chane-status', $case->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control" required>
                            <option value="">--select one --</option>
                            <option value="Case Submitted">Case Submitted</option>
                            <option value="Case Under Proccess">Case Under Proccess</option>
                            <option value="Case Completed">Case Completed</option>
                            <option value="Case Cancelled">Case Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>





@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#descmodal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var message = button.data('message');
                // var messageription = button.data('messageription')
                var modal = $(this);
                modal.find('.modal-body #message').val(message);
            });
            $('#exampleModal_6').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                // var idription = button.data('idription')
                var modal = $(this);
                modal.find('.modal-body #id').val(id);
            });

            $('#exampleModal_115').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var job = button.data('job');
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #job').val(job);
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
            $

        });
    </script>
@endpush

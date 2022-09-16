@extends('layouts.user.employer.master')
@section('title', 'Dashboard | APPLICATIONS')
@push('css')
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
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div>
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Application Details</strong><small> Job:
                                                    {{ $application->job->post_number }}</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="custom-tab">

                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link" id="custom-nav-home-tab"
                                                                data-toggle="tab" href="#custom-nav-home" role="tab"
                                                                aria-controls="custom-nav-home"
                                                                aria-selected="false">General Information</a>
                                                            <a class="nav-item nav-link" id="custom-nav-home-tab"
                                                                data-toggle="tab" href="#custom-nav-lang" role="tab"
                                                                aria-controls="custom-nav-home"
                                                                aria-selected="false">Language LEVEL</a>
                                                            <a class="nav-item nav-link" id="custom-nav-home-tab"
                                                                data-toggle="tab" href="#custom-nav-employers"
                                                                role="tab" aria-controls="custom-nav-home"
                                                                aria-selected="false">Employer Experince</a>

                                                            <a class="nav-item nav-link" id="custom-nav-home-tab"
                                                                data-toggle="tab" href="#custom-nav-education"
                                                                role="tab" aria-controls="custom-nav-home"
                                                                aria-selected="false">Education</a>

                                                            <a class="nav-item nav-link" id="custom-nav-home-tab"
                                                                data-toggle="tab" href="#custom-nav-attachments"
                                                                role="tab" aria-controls="custom-nav-home"
                                                                aria-selected="false">Attachments</a>


                                                            <a class="nav-item nav-link" id="custom-nav-home-actions"
                                                                data-toggle="tab" href="#custom-nav-actions"
                                                                role="tab" aria-controls="custom-nav-home"
                                                                aria-selected="false">Actions</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                        <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">

                                                            <h3>Application Information</h3>
                                                            <div style="background: #f7ff9c" class="fromDiv mb-5 mt-2">
                                                                <p>
                                                                    From: {{ $application->user->name }}
                                                                </p>
                                                                <p>
                                                                    E-mail: {{ $application->user->email }}
                                                                </p>
                                                                <p>
                                                                    Mobile: {{ $application->user->mobile }}
                                                                </p>
                                                            </div>
                                                            <br>

                                                            <div class="contiane">
                                                                <div class="row">
                                                                    <div class="text-right">
                                                                        @php
                                                                            $photo = $application->attachments->where('type', 'Personal Photo')->first()->name;
                                                                        @endphp
                                                                        <img src="{{ Storage::url('public/uploads/applications' . '/' . $application->id . '/attachments' . '/' . $photo) }}"
                                                                            width="200" height="200"
                                                                            style="margin-left:70%;border: 1px solid black;">
                                                                    </div>

                                                                    <div class="col-sm-">
                                                                        <table style="margin-top: -150px"
                                                                            class="table table-responsive">
                                                                            <tr>
                                                                                <td>Ref: {{ $application->ref }}</td>
                                                                                <td>Date:
                                                                                    {{ $application->job->created_at }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr></tr>

                                                                            <tr>
                                                                                <td>Full_Name:
                                                                                    {{ $application->full_name }}</td>
                                                                                <td>
                                                                                    Position Applied For:
                                                                                    {{ $application->title->name }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Address:
                                                                                    {{ $application->address }}</td>
                                                                                <th>Contact_No:
                                                                                    {{ $application->contact_no }}
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Passport_No:
                                                                                    {{ $application->passport_no }}
                                                                                </td>
                                                                                <th>Nationality:
                                                                                    {{ $application->Nationlaity ?? 'UNKOWN' }}
                                                                                </th>

                                                                            </tr>
                                                                            @isset($application->visa_number)
                                                                                <tr>
                                                                                    <td>Visa_Number</td>
                                                                                    <td>{{ $application->visa_number }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endisset
                                                                            @isset($application->flight_ticket)
                                                                                <tr>
                                                                                    <td>flight_ticket</td>
                                                                                    <td>{{ $application->flight_ticket }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endisset
                                                                            <tr id="tt">
                                                                                <td>Place Issued:
                                                                                    {{ $application->place_issued }}
                                                                                </td>
                                                                                <td>Place Of Birth:
                                                                                    {{ $application->place_of_birth ?? 'UNKOWN' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Date Issued:
                                                                                    {{ $application->date_issued }}
                                                                                </td>
                                                                                <td>Age: {{ $application->age }}</td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td>Expiry Dte:
                                                                                    {{ $application->expiry_issued }}
                                                                                </td>
                                                                                <td>Relegion:
                                                                                    {{ $application->relegion }}</td>
                                                                            </tr>

                                                                            <tr>

                                                                            </tr>

                                                                            <tr>
                                                                                <td>flight_ticket:
                                                                                    {{ $application->flight_ticket ?? 'NONE' }}
                                                                                </td>
                                                                                <td>sex: {{ $application->sex }}</td>
                                                                                <td>status:
                                                                                    {{ $application->status }}</td>
                                                                                <td>children:
                                                                                    {{ $application->children }}</td>
                                                                                <td>height:
                                                                                    {{ $application->height }}</td>
                                                                                <td>weight:
                                                                                    {{ $application->weight }}</td>
                                                                            </tr>

                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        {{-- Languages Levels --}}
                                                        <div class="tab-pane fade" id="custom-nav-lang" role="tabpanel"
                                                            aria-labelledby="custom-nav-contact-tab">
                                                            <p>
                                                            <div class="col-sm-12 ">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Language</th>
                                                                                <th scope="col">Speak</th>
                                                                                <th scope="col">Understand</th>
                                                                                <th scope="col">Read</th>
                                                                                <th scope="col">Write</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ 1 }}
                                                                                </th>
                                                                                <td>Arabic</td>
                                                                                <td>{{ $application->arabic_speak }}
                                                                                </td>
                                                                                <td>{{ $application->arabic_understand }}
                                                                                </td>
                                                                                <td>{{ $application->arabic_read }}
                                                                                </td>
                                                                                <td>{{ $application->arabic_write }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ 2 }}
                                                                                </th>
                                                                                <td>English</td>
                                                                                <td>{{ $application->english_speak }}
                                                                                </td>
                                                                                <td>{{ $application->english_understand }}
                                                                                </td>
                                                                                <td>{{ $application->english_read }}
                                                                                </td>
                                                                                <td>{{ $application->english_write }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ 3 }}
                                                                                </th>
                                                                                <td>Hindi</td>
                                                                                <td>{{ $application->hindi_speak }}
                                                                                </td>
                                                                                <td>{{ $application->hindi_understand }}
                                                                                </td>
                                                                                <td>{{ $application->hindi_read }}
                                                                                </td>
                                                                                <td>{{ $application->hindi_write }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            </p>
                                                        </div>



                                                        {{-- Employer Experince --}}

                                                        <div class="tab-pane fade" id="custom-nav-employers"
                                                            role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                            <p>
                                                            <div class="col-sm-12 ">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Employer Name
                                                                                </th>
                                                                                <th scope="col">Duration</th>
                                                                                <th scope="col">Country</th>
                                                                                <th scope="col">Designation</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $i = 1;
                                                                            @endphp
                                                                            @forelse ($application->employers as $emplyoer)
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        {{ $i++ }}
                                                                                    </th>
                                                                                    <td>{{ $emplyoer->name }}
                                                                                    </td>
                                                                                    <td>{{ $emplyoer->duration }}
                                                                                    </td>
                                                                                    <td>{{ $emplyoer->country }}
                                                                                    </td>
                                                                                    <td>{{ $emplyoer->designation }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="7"
                                                                                        class="alert alert-warning  bg-dark"
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




                                                        {{-- Employer Education --}}
                                                        <div class="tab-pane fade" id="custom-nav-education"
                                                            role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                            <p>
                                                            <div class="col-sm-12 ">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Degree</th>
                                                                                <th scope="col">Year</th>
                                                                                <th scope="col">Educational Body
                                                                                </th>
                                                                                <th scope="col">Country</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $i = 1;
                                                                            @endphp
                                                                            @forelse ($application->educations as $edu)
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        {{ $i++ }}
                                                                                    </th>
                                                                                    <td>{{ $edu->degree }}</td>
                                                                                    <td>{{ $edu->year }}</td>
                                                                                    <td>{{ $edu->collage }}</td>
                                                                                    <td>{{ $edu->country }}</td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="7"
                                                                                        class="alert alert-warning  bg-dark"
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

                                                        {{-- Attachments --}}
                                                        <div class="tab-pane fade" id="custom-nav-attachments"
                                                            role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                            <p>
                                                            <div class="col-sm-12 text-center">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">SR</th>
                                                                                <th scope="col">BY</th>
                                                                                <th scope="col">file</th>
                                                                                <th scope="col">date</th>
                                                                                <th scope="col">Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $i = 1;
                                                                            @endphp
                                                                            @php
                                                                                $attachments = $application
                                                                                    ->attachments()
                                                                                    ->where('is_forwarded_employer', true)
                                                                                    ->orderByDesc('created_at')
                                                                                    ->paginate(15);
                                                                            @endphp
                                                                            @forelse ($attachments as $file)
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        {{ $i++ }}</th>
                                                                                    <td>{{ $application->job->post_number }}
                                                                                    </td>
                                                                                    <td>{{ $file->user->name }}</td>
                                                                                    <td>{{ $file->name }}</td>
                                                                                    <td>{{ $file->created_at }}</td>
                                                                                    @if ($application->job->subStatus->name != 'Demand Cancelled' &&
                                                                                        $application->job->subStatus->name != 'Demand Complete')
                                                                                        <td>

                                                                                            <a title="Download"
                                                                                                href="{{ route('application.attachment.download', ['id' => $file->application_id, 'fileName' => $file->name]) }}">
                                                                                                <i
                                                                                                    class="fa fa-download"></i>&nbsp;
                                                                                            </a>

                                                                                            <a title="Download"
                                                                                                href="{{ route('application.attachment.open', ['id' => $file->application_id, 'fileName' => $file->name]) }}">
                                                                                                <i
                                                                                                    class="fa fa-eye"></i>&nbsp;
                                                                                            </a>

                                                                                            </li>
                                                                                            <a title="Send Note"
                                                                                                href="#exampleModal_5"
                                                                                                data-id="{{ $file->application->id }}"
                                                                                                data-toggle="modal"
                                                                                                href="#"><i
                                                                                                    class="fa fa-edit"></i></a>

                                                                                            {{-- <li><a class="dropdown-item badge bg-primary" data-toggle="modal"
                                                                                                            data-id="{{ $file->application->id }}"
                                                                                                            data-title="{{ $file->application->job->title }}"
                                                                                                            data-number="{{ $file->application->job->post_number }}"
                                                                                                            href="#exampleModal_6">Accept</a>
                                                                                                    </li> --}}


                                                                                        </td>
                                                                                    @endif
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="8"
                                                                                        class="alert alert-warning text-center bg-dark"
                                                                                        style="color:#fff">
                                                                                        No Records Yet
                                                                                    </td>
                                                                                </tr>
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                    {{ $attachments->links() }}
                                                                </div>
                                                            </div>
                                                            </p>
                                                        </div>








                                                        {{-- Actions --}}
                                                        @if ($application->job->subStatus->name != 'Demand Cancelled' &&
                                                            $application->job->subStatus->name != 'Demand Complete' &&
                                                            $application->subStatus != 'Cancelled Application')
                                                            <div class="tab-pane fade" id="custom-nav-actions"
                                                                role="tabpanel"
                                                                aria-labelledby="custom-nav-contact-tab">
                                                                <p>
                                                                <div class="col-sm-12 ">
                                                                    @if (!$application->is_accepted)
                                                                        <a class="btn btn-outline-success"
                                                                            data-toggle="modal"
                                                                            href="#exampleModal_6">Accept
                                                                            Application</a>
                                                                    @endif

                                                                    @if (!$application->is_accepted)
                                                                        <a class="btn btn-outline-info"data-toggle="modal"
                                                                            data-target="#exampleModal_5">Send
                                                                            Comment</a>
                                                                        <a class="btn btn-outline-danger"
                                                                            data-toggle="modal"
                                                                            href="#exampleModal_1">Reject
                                                                            Application</a>
                                                                    @endif
                                                                </div>
                                                                </p>
                                                            </div>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>








                                            <!--
                                                Modal_1
                                                This modal is for sending notes
                                            -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" wire:ignore aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Write A
                                                                Note:</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form wire:submit.prevent="sendApplicationNote()">
                                                                <div class="form-group">
                                                                    <label for="">Note<span
                                                                            class="text-danger">*
                                                                        </span> :</label>
                                                                    <textarea class="form-control" required wire:model.lazy="note"></textarea>
                                                                    @error('note')
                                                                        <span
                                                                            class="text-dagner">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send
                                                                Note</button>
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

                    </div>

                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="exampleModal_5" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send A
                                Note:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.applications.note.send', $application->id) }}"
                                method="POST">
                                @csrf
                                <div class="form-group col-sm-12 mb-3">
                                    <label for="" style="font-weight: 600">Message:</label>
                                    &nbsp; &nbsp;
                                    <textarea name="message" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-sm-6 text-center" style="width: 100%">
                                    <button type="submit" class="btn btn-outline-primary"><i
                                            class="fa fa-submit"></i>
                                        SUBMIT</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal_6" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.application.accept', $application->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">JobL Title: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="title" readonly>
                                    <input type="text" id="id" name="application_id" hidden>
                                </div> --}}
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">Demand SR: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="number" readonly
                                        value="{{ $application->job->post_number }}">
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600" id="title"></label>
                                    <select name="file_type" class="form-control" id="">
                                        <option value="visa">Visa</option>
                                        <option value="offer letter">Offer Letter</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <input type="text" id="vnumber" name="visa_number"
                                        class="form-control mt-2" placeholder="Enter Visa Number..">
                                    &nbsp; &nbsp; <input type="file" name="files[]" multiple>
                                    <input type="text" id="id" name="id" hidden>
                                </div>
                                <div class="form-group col-sm-6 text-center" style="width: 100%">
                                    <button type="submit" class="btn btn-outline-primary"><i
                                            class="fa fa-submit"></i>
                                        ACCEPT</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Refuse Offer Modal -->
            <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Refuse Application</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('employer.application.refuse', $application->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <textarea class="form-control" id="reason" name="reason" required placeholder="Tell Us The Resaon"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

    <script>
        $('#exampleModal_6').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            // var title = button.data('title')
            // var number = button.data('number')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            $('select[name="file_type"]').on('change', function() {
                if ($(this).val() == 'visa') {
                    $('#vnumber').show();
                } else {
                    $('#vnumber').hide();
                    $('#vnumber').removeAttribute('name');
                }

            });
            // modal.find('.modal-body #title').val(title);
            // modal.find('.modal-body #number').val(number);
        });
        $('#exampleModal_5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>


    <script>
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            const data = {
                    labels: [
                        'Red',
                        'Blue',
                        'Yellow'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [300, 50, 100],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                },
        });
    </script>
@endpush


@endsection

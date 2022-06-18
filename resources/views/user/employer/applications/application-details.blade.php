@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
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
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                        <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">

                                                            <h3>Application Information</h3>
                                                            <div style="background: #f7ff9c" class="fromDiv">
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

                                                                    <div>
                                                                        Position Applied For:
                                                                        {{ $application->title->name }}
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <img src="{{ asset('storage/uploads/applications/'.$application->id.'/attachments'.'/'.$application->attachments->where('type'  , 'Personal Photo')->first()->name) }}"
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
                                                                            <tr id="tt">
                                                                                <td>Place Issued:
                                                                                    {{ $application->place_issued }}
                                                                                </td>
                                                                                <td>Place Issued:
                                                                                    {{ $application->place_of_birth }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Date Issued:
                                                                                    {{ $application->date_issued }}
                                                                                </td>
                                                                                <td>Date Issued:
                                                                                    {{ $application->date_of_birth }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Expiry Dte:
                                                                                    {{ $application->expiry_issued }}
                                                                                </td>
                                                                                <td>Age: {{ $application->age }}</td>
                                                                                <td>Relegion:
                                                                                    {{ $application->relegion }}</td>
                                                                            </tr>
                                                                            <tr>
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



                                                        {{-- <div class="tab-pane fade" id="custom-nav-home"
                                                            role="tabpanel">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <br>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputEmail3"
                                                                            class="">Job Category:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->title->sector->name }}"
                                                                            class="form-control" id="inputEmail3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Title:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->title->name }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Ref:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->ref }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Date:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->date }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Address:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->address }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Full
                                                                            Name:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->full_name }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Passport
                                                                            No:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->passport_no }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Contact
                                                                            No:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->contact_no }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Place Of
                                                                            Birth:</label>

                                                                        <input type="text"
                                                                            value="{{ $application->place_of_birth }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Date Of Birth:
                                                                        </label>
                                                                        <input type="text"
                                                                            value="{{ $application->date_of_birth }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Age:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->age }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Relegion:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->relegion }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Place
                                                                            Issued:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->place_issued }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Date
                                                                            Issued:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->date_issued }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Place
                                                                            Issued:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->expiry_issued }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Date
                                                                            Issued:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->sex }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">Children:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->children }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">height:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->height }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <label for="inputPassword3"
                                                                            class="col-form-label">weihgt:</label>
                                                                        <input type="text"
                                                                            value="{{ $application->weihgt }}"
                                                                            class="form-control" id="inputPassword3"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

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


                                            <!--SHOW NOTE  Modal -->
                                            <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Message:
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                ٍApplication Status:</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form wire:submit.preventDefault="changeStatus()">
                                                            <div class="modal-body">
                                                                <select wire:model="status" class="form-control">
                                                                    <option value="waiting for medical">waiting for
                                                                        medical</option>
                                                                    <option value="waiting for visa">waiting for
                                                                        visa
                                                                    </option>
                                                                    <option value="CV Submitted">CV Submitted
                                                                    </option>
                                                                    <option value="For Selection">For Selection
                                                                    </option>
                                                                    <option value="waiting for interview">waiting
                                                                        for
                                                                        interview</option>
                                                                    <option value="cancelled">cancelled</option>
                                                                    <option value="active">active</option>
                                                                    <option value="hold">hold</option>
                                                                    <option value="completed">completed</option>
                                                                    <option value="Arrival Scheduled">Arrival
                                                                        Scheduled
                                                                    </option>
                                                                    <option value="LMRA Process">LMRA Process
                                                                    </option>
                                                                    <option value="Ready for Payment">Ready for
                                                                        Payment
                                                                    </option>
                                                                    <option value="Embassy">Embassy</option>
                                                                    <option value="Emigrate Process">Emigrate
                                                                        Process
                                                                    </option>
                                                                    <option value="To Be Arrived">To Be Arrived
                                                                    </option>
                                                                    <option value="Arrived">Arrived</option>
                                                                    <option value="Arrival Scheduled">Arrival
                                                                        Scheduled
                                                                    </option>
                                                                    <option value="For Exited">For Exited</option>
                                                                    <option value="Exited">Exited</option>
                                                                    <option value="Worker Refuse to Work">Worker
                                                                        Refuse
                                                                        to Work</option>
                                                                    <option value="UNFIT">UNFIT</option>
                                                                    <option value="Runaway">Runaway</option>
                                                                    <option value="For Local Transfer">For Local
                                                                        Transfer</option>
                                                                    <option value="Canceled Application">Canceled
                                                                        Application</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Change</button>
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
                                                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                                                        crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                                                        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                                                        crossorigin="anonymous"></script>

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

                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal_5" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send A Note:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.applications.note.send') }}" method="POST">
                                @csrf
                                <div class="form-group col-sm-12 mb-3">
                                    <label for="" style="font-weight: 600">Message:</label>
                                    &nbsp; &nbsp;
                                    <textarea name="message" class="form-control"></textarea>
                                    <input type="text" id="id" name="application_id" hidden>
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
            <div class="modal fade" id="exampleModal_6" tabindex="-1" wire:ignore
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.application.accept') }}" method="POST">
                                @csrf
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">JobL Title: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="title" readonly>
                                    <input type="text" id="id" name="application_id" hidden>
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">Job Number: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="number" readonly>
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
                var title = button.data('title')
                var number = button.data('number')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #title').val(title);
                modal.find('.modal-body #number').val(number);
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


</div>
</div>
@endsection

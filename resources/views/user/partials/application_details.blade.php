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
                                            <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                                href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                                aria-selected="false">General Information</a>
                                            <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                                href="#custom-nav-lang" role="tab" aria-controls="custom-nav-home"
                                                aria-selected="false">Language LEVEL</a>
                                            <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                                href="#custom-nav-employers" role="tab"
                                                aria-controls="custom-nav-home" aria-selected="false">Employer
                                                Experince</a>

                                            <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                                href="#custom-nav-education" role="tab"
                                                aria-controls="custom-nav-home" aria-selected="false">Education</a>

                                            <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                                href="#custom-nav-attachments" role="tab"
                                                aria-controls="custom-nav-home" aria-selected="false">Attachments</a>
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
                                                        <img src="{{ asset('storage/uploads/applications/' . $application->id . '/attachments' . '/' . $photo) }}"
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
                                                                <td>Visa_Number:
                                                                    {{ $application->visa_number ?? 'NONE' }}</td>
                                                                <td>flight_ticket:
                                                                    {{ $application->flight_ticket ?? 'NONE' }}
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                            </tr>

                                                            <tr>

                                                                <td>status:
                                                                    {{ $application->status }}</td>
                                                                <td>sex: {{ $application->sex }}</td>


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

                                        <div class="tab-pane fade" id="custom-nav-employers" role="tabpanel"
                                            aria-labelledby="custom-nav-contact-tab">
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
                                        <div class="tab-pane fade" id="custom-nav-education" role="tabpanel"
                                            aria-labelledby="custom-nav-contact-tab">
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
                                        <div class="tab-pane fade" id="custom-nav-attachments" role="tabpanel"
                                            aria-labelledby="custom-nav-contact-tab">
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
                                                                    <td>

                                                                        <a title="Download"
                                                                            href="{{ route('application.attachment.download', ['id' => $file->application_id, 'fileName' => $file->name]) }}">
                                                                            <i class="fa fa-download"></i>&nbsp;
                                                                        </a>
                                                                        </li>
                                                                        <a title="Send Note" href="#exampleModal_5"
                                                                            data-id="{{ $file->application->id }}"
                                                                            data-toggle="modal" href="#"><i
                                                                                class="fa fa-edit"></i></a>

                                                                        {{-- <li><a class="dropdown-item badge bg-primary" data-toggle="modal"
                                                                                                data-id="{{ $file->application->id }}"
                                                                                                data-title="{{ $file->application->job->title }}"
                                                                                                data-number="{{ $file->application->job->post_number }}"
                                                                                                href="#exampleModal_6">Accept</a>
                                                                                        </li> --}}


                                                                    </td>
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
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form wire:submit.prevent="sendApplicationNote()">
                                                <div class="form-group">
                                                    <label for="">Note<span class="text-danger">*
                                                        </span> :</label>
                                                    <textarea class="form-control" required wire:model.lazy="note"></textarea>
                                                    @error('note')
                                                        <span class="text-dagner">{{ $message }}</span>
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

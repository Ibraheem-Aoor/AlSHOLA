<div wire:ignore>
    <style>
        input {
            font-size: 0.9rem !important;
            line-height: 1;

        }
    </style>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Application Details</strong><small> status:
                                {{ $application->mainStatus->name }}</small>

                        </div>
                        <div class="card-body">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">General Information</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-attachments" role="tab"
                                            aria-controls="custom-nav-home" aria-selected="false">Attachments</a>

                                        @isset($application->job_id)
                                            @if ($application->job->terms->count() > 0)
                                                <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                                    href="#custom-nav-terms" role="tab" aria-controls="custom-nav-home"
                                                    aria-selected="false">Terms</a>
                                            @endif
                                        @endisset
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-refused" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Refused</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-notes" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Notes
                                            @if ($unreadNotes)
                                                <span class="text-danger">
                                                    {{ '( ' . $unreadNotes . ' )' }}
                                                </span>
                                            @endif
                                        </a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-history" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Status History</a>
                                        @isset($application->job_id)
                                            <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                                href="#custom-nav-actions" role="tab" aria-controls="custom-nav-contact"
                                                aria-selected="false">Actions</a>
                                        @endisset
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">
                                        <div class="container">
                                            {{-- Basic From --}}
                                            <div class="row bg-light text-center">
                                                <div class="col-sm-4">DSR: {{$application->job?->post_number}}</div>
                                                <div class="col-sm-4">
                                                    Client: {{$application->user?->name}}
                                                </div>
                                                <div class="col-sm-4">
                                                    Agent: {{$application->job?->user?->name}}
                                                </div>
                                            </div>
                                            @include('application-template', [
                                                'application' => $application,
                                            ])
                                        </div>
                                    </div>



                                    {{-- Notes --}}
                                    <div class="tab-pane fade" id="custom-nav-notes" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 ">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Sender</th>
                                                            <th scope="col">creation_date</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @forelse ($application->notes->sortByDesc('id') as $note)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $note->user->name . ' ( ' . $note->user->type . ' )' }}
                                                                </td>
                                                                <td>{{ \Carbon\Carbon::parse($note->created_at)->format('Y-M-d') }}
                                                                </td>
                                                                @if ($application->job->subStatus->name != 'Demand Cancelled' &&
                                                                    $application->job->subStatus->name != 'Demand Complete' &&
                                                                    $application->subStatus->name != 'Cancelled Application')
                                                                    <td><a class="btn btn-outline-primary"
                                                                            data-message="{{ $note->message }}"
                                                                            data-toggle="modal" href="#exampleModal_5"
                                                                            wire:click="setReadNote({{ $note->id }})"><i
                                                                                class="fa fa-eye"></i>
                                                                        </a></td>
                                                                @endif
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"
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

                                    {{-- Status History --}}
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
                                                        @forelse ($application->statusHistory->sortByDesc('id') as $record)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $record->prev_status }}</td>
                                                                <td>{{ $record->status }}</td>
                                                                <td>{{ $record->user->name }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($record->created_at)->format('Y-M-d') }}
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5"
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
                                        <div class="col-sm-12 ">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">User</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Date</th>
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
                                                                ->orderByDesc('created_at')
                                                                ->simplePaginate(15);
                                                        @endphp
                                                        @forelse ($attachments as $attachment)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $attachment->user->name . ' (' . $attachment->user->type . ' )' }}
                                                                </td>
                                                                <td>{{ $attachment->name }}</td>
                                                                <td>{{ $attachment->type }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($attachment->created_at)->format('Y-M-d') }}
                                                                </td>
                                                                @isset($application->job_id)
                                                                    @if ($application->job->subStatus->name != 'Demand Cancelled' &&
                                                                        $application->job->subStatus->name != 'Demand Complete' &&
                                                                        $application->subStatus->name != 'Cancelled Application')
                                                                        <td>
                                                                            <a href="{{ route('admin.application.attachment.download', ['id' => $application->id, 'fileName' => $attachment->name]) }}"
                                                                                class="text-primary">
                                                                                <i class="fa fa-download"></i>
                                                                                <a href="{{ route('admin.application.attachment.open', ['id' => $application->id, 'fileName' => $attachment->name]) }}"
                                                                                    class="text-primary">
                                                                                    <i class="fa fa-eye"></i>
                                                                                    <a href="{{ route('admin.application.attachment.delete', ['id' => $application->id, 'fileName' => $attachment->name]) }}"
                                                                                        class="text-danger">
                                                                                        <i class="fa fa-trash"></i>
                                                                                    </a>
                                                                                    @if ($attachment->user->type == 'Agent' || $attachment->user->type == 'Admin')
                                                                                        @if (!$attachment->is_forwarded_employer)
                                                                                            <a title="Forward To Client"
                                                                                                class="text-info"
                                                                                                wire:click="passAttachmentToEmployer('{{ $attachment->id }}')">
                                                                                                <i
                                                                                                    class="fa fa-location-arrow"></i>
                                                                                            </a>
                                                                                        @else
                                                                                            <a title="cancel"
                                                                                                class="text-info"
                                                                                                style="cursor: pointer;"
                                                                                                wire:click="takeFromEmplyoer('{{ $attachment->id }}')">
                                                                                                <i class="fa fa-times"></i>
                                                                                            </a>
                                                                                        @endif
                                                                                    @else
                                                                                        @if (!$attachment->is_forwarded_talent)
                                                                                            <a title="Forward To Agent"
                                                                                                class="text-info"
                                                                                                style="cursor: pointer;"
                                                                                                wire:click="passAttachmentToEmployee('{{ $attachment->id }}')">
                                                                                                <i
                                                                                                    class="fa fa-location-arrow"></i>
                                                                                            </a>
                                                                                        @else
                                                                                            <a title="cancel"
                                                                                                class="text-info"
                                                                                                style="cursor: pointer;"
                                                                                                wire:click="takeFromEmplyoee('{{ $attachment->id }}')">
                                                                                                <i class="fa fa-times"></i>
                                                                                            </a>
                                                                                        @endif
                                                                                    @endif
                                                                        </td>
                                                                    @endif
                                                                @endisset
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
                                                {!! $attachments->fragment('custom-nav-attachments')->links() !!}
                                            </div>
                                        </div>
                                        </p>
                                    </div>

                                    @isset($application->job_id)
                                        @if ($application->job->terms->count() > 0)
                                            {{-- Terms --}}
                                            <div class="tab-pane fade" id="custom-nav-terms" role="tabpanel"
                                                aria-labelledby="custom-nav-contact-tab">
                                                <p>
                                                <div class="col-sm-12 text-center">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Title</th>
                                                                    <th scope="col">Charge</th>
                                                                    <th scope="col">Per</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $i = 1;
                                                                @endphp
                                                                @php
                                                                    $terms = $application->job
                                                                        ->terms()
                                                                        ->where('user_id', $this->application->user->id)
                                                                        ->simplePaginate(15);
                                                                @endphp
                                                                @forelse ($terms as $term)
                                                                    <tr>
                                                                        <th scope="row">
                                                                            {{ $i++ }}</th>
                                                                        <td>{{ $term->title }}
                                                                        </td>
                                                                        <td>{{ $term->serivce_charge }}</td>
                                                                        <td>{{ $term->per }}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($term->created_at)->format('Y-M-d') }}
                                                                        </td>
                                                                        {{-- <td>

                                                                 <a title="Download"
                                                                     href="{{ route('application.attachment.download', ['id' => $file->application_id, 'fileName' => $file->name]) }}">
                                                                     <i
                                                                         class="fa fa-download"></i>&nbsp;
                                                                 </a>
                                                                 </li>
                                                                 <a title="Send Note"
                                                                     href="#exampleModal_5"
                                                                     data-id="{{ $file->application->id }}"
                                                                     data-toggle="modal"
                                                                     href="#"><i
                                                                         class="fa fa-edit"></i></a>

                                                                  <li><a class="dropdown-item badge bg-primary" data-toggle="modal"
                                                                                    data-id="{{ $file->application->id }}"
                                                                                    data-title="{{ $file->application->job->title }}"
                                                                                    data-number="{{ $file->application->job->post_number }}"
                                                                                    href="#exampleModal_6">Accept</a>
                                                                            </li>


                                                             </td> --}}
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
                                                        {{ $terms->fragment('custom-nav-terms')->links() }}
                                                    </div>
                                                    <div>
                                                        <ul style="font-size: 9px;">
                                                            <li>Agent Confirm the Demand accepted or
                                                                Rejected within
                                                                {{ $application->job->terms->first()->acceptence_duration }}
                                                                Day</li>
                                                            <li>Agent Submit the candidate CV's
                                                                within
                                                                {{ $application->job->terms->first()->submission_duration }}
                                                                Days from
                                                                receiving the signature of the
                                                                demand </li>
                                                            <li> A
                                                                {{ $application->job->terms->first()->completion_duration }}
                                                                day total duration is expected for
                                                                demand till
                                                                complete.</li>
                                                            <li>{{ $application->job->terms->first()->pay_from }}
                                                                {{ $application->job->terms->first()->pay_from == 'Alshoala' ? ' Recruitment Services W. L. L. ' : '' }}
                                                                will
                                                                pay to
                                                                {{ $application->job->terms->first()->pay_to }}
                                                                {{ $application->job->terms->first()->pay_to == 'Alshoala' ? ' Recruitment Services W. L. L. ' : '' }}the
                                                                Service Charge
                                                                {{ $application->job->terms->first()->after_before }}
                                                                candidate arrival
                                                                date.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                </p>
                                            </div>
                                        @endif
                                    @endisset


                                    {{-- Refused --}}
                                    <div class="tab-pane fade" id="custom-nav-refused" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 ">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Client Name</th>
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
                                                            $refused = $application
                                                                ->refused()
                                                                ->orderByDesc('created_at')
                                                                ->simplePaginate(15);
                                                        @endphp
                                                        @forelse ($refused as $refuse)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $refuse->user->name }}</td>
                                                                <td>{{ Str::limit($refuse->reason, 30, '...') }}
                                                                </td>
                                                                <td>{{ \Carbon\Carbon::parse($refuse->created_at)->format('Y-M-d') }}
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
                                                                <td colspan="7"
                                                                    class="alert alert-warning  bg-dark"
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


                                    @isset($application->job_id)
                                        <div class="tab-pane fade" id="custom-nav-actions" role="tabpanel"
                                            aria-labelledby="custom-nav-contact-tab">
                                            <p>
                                            <div class="form-group">
                                                <label for="">Actions:</label><br>
                                                @if ($application->job->subStatus->name != 'Demand Cancelled' &&
                                                    $application->job->subStatus->name != 'Demand Complete')
                                                    <a class="btn btn-success col-sm-12 mb-2"
                                                        wire:click="passApplicationToEmployer()">Forward To Client</a>
                                                    {{-- <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                        href="#exampleModal">
                                                        Send a Note </a> --}}
                                                    <a class="btn btn-primary col-sm-12 mb-2"
                                                        href="{{ route('admin.application.pdf.generate', $application->id) }}">
                                                        PRINT PDF</a>
                                                    <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                        href="#exampleModal_8">
                                                        Change Status</a>
                                                @endif
                                            </div>
                                            </p>
                                        </div>
                                    @endisset
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
                                        <form wire:submit.prevent="sendApplicationNote()">
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
                                        <h5 class="modal-title" id="exampleModalLabel">ٍApplication Status:</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST"
                                        action="{{ route('admin.application.change-status', $application->id) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select name="mainStatus" id="mainStatus" wire:model="mainStatus"
                                                    class="form-control" required>
                                                    <option value="">--select one --</option>
                                                    @foreach ($mainStatuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            @if ($application->main_status_id == $status->id) {{ 'selected' }} @endif>
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                    @error($mainStatus)
                                                        <span style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </select>
                                            </div>
                                            <div class="form-gorup">

                                                <select name="subStatus" class="form-control" id="subStatus"
                                                    required>
                                                    <option value="">--select one --</option>

                                                </select>
                                                @error($subStatus)
                                                    <span style="color:red">{{ $message }}</span>
                                                @enderror
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#ajaxSubmit').click(function(e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });

                $.ajax({
                    url: "{{ url('/admin/application/status/change') }}",
                    method: 'POST',
                    data: {
                        name: $('#mainStatus').val(),
                        type: $('#subStatus').val(),
                    },
                    success: function(result) {
                        alert('good');
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('select[name="mainStatus"]').on('change', function() {
                    var id = $(this).val();
                    if (id) {
                        $.ajax({
                            url: "{{ URL::to('admin/application/substatus') }}/" + id,
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

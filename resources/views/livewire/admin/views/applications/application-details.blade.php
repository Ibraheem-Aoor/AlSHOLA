<div wire:ignore>
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
                                            href="#custom-nav-lang" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Language LEVEL</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-employers" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Employer Experince</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-notes" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Notes</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-history" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Status History</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-actions" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Actions</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="inputEmail3" class="">Job
                                                        Category:</label>
                                                    <input type="text"
                                                        value="{{ $application->job->title->sector->name }}"
                                                        class="form-control" id="inputEmail3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Title:</label>
                                                    <input type="text" value="{{ $application->job->title->name }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Ref:</label>
                                                    <input type="text" value="{{ $application->ref }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Date:</label>
                                                    <input type="text" value="{{ $application->date }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Address:</label>
                                                    <input type="text" value="{{ $application->address }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Full
                                                        Name:</label>
                                                    <input type="text" value="{{ $application->full_name }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Passport
                                                        No:</label>
                                                    <input type="text" value="{{ $application->passport_no }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Contact
                                                        No:</label>
                                                    <input type="text" value="{{ $application->contact_no }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Place Of
                                                        Birth:</label>

                                                    <input type="text" value="{{ $application->place_of_birth }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Date Of Birth:
                                                    </label>
                                                    <input type="text" value="{{ $application->date_of_birth }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Age:</label>
                                                    <input type="text" value="{{ $application->age }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Relegion:</label>
                                                    <input type="text" value="{{ $application->relegion }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Place
                                                        Issued:</label>
                                                    <input type="text" value="{{ $application->place_issued }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Date
                                                        Issued:</label>
                                                    <input type="text" value="{{ $application->date_issued }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Place
                                                        Issued:</label>
                                                    <input type="text" value="{{ $application->expiry_issued }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Date
                                                        Issued:</label>
                                                    <input type="text" value="{{ $application->sex }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">Children:</label>
                                                    <input type="text" value="{{ $application->children }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">height:</label>
                                                    <input type="text" value="{{ $application->height }}"
                                                        class="form-control" id="inputPassword3" readonly>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="inputPassword3" class="col-form-label">weihgt:</label>
                                                    <input type="text" value="{{ $application->weihgt }}"
                                                        class="form-control" id="inputPassword3" readonly>
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
                                                            <th scope="row">{{ 1 }}</th>
                                                            <td>Arabic</td>
                                                            <td>{{ $application->arabic_speak }}</td>
                                                            <td>{{ $application->arabic_understand }}</td>
                                                            <td>{{ $application->arabic_read }}</td>
                                                            <td>{{ $application->arabic_write }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">{{ 2 }}</th>
                                                            <td>English</td>
                                                            <td>{{ $application->english_speak }}</td>
                                                            <td>{{ $application->english_understand }}</td>
                                                            <td>{{ $application->english_read }}</td>
                                                            <td>{{ $application->english_write }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">{{ 3 }}</th>
                                                            <td>Hindi</td>
                                                            <td>{{ $application->hindi_speak }}</td>
                                                            <td>{{ $application->hindi_understand }}</td>
                                                            <td>{{ $application->hindi_read }}</td>
                                                            <td>{{ $application->hindi_write }}</td>
                                                        </tr>
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
                                                                <td>{{ $note->created_at }}</td>
                                                                <td><a class="btn btn-outline-primary"
                                                                        data-message="{{ $note->message }}"
                                                                        data-toggle="modal" href="#exampleModal_5"><i
                                                                            class="fa fa-eye"></i> show
                                                                        message</a></td>
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
                                                        @forelse ($application->employers as $emplyoer)
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
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-actions" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Actions:</label><br>
                                            <a class="btn btn-success col-sm-12 mb-2"
                                                wire:click="passApplicationToEmployer()">Forward To Client</a>
                                            <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal">
                                                Send a Note </a>
                                            <a class="btn btn-primary col-sm-12 mb-2" data-toggle="modal"
                                                href="#exampleModal_8">
                                                Change Status</a>
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
                                        <form wire:submit.prevent="sendApplicationNote()">
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
                                        <h5 class="modal-title" id="exampleModalLabel">ٍApplication Status:</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form wire:submit="changeStatus()">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select name="mainStatus" wire:model.lazy="mainStatus" class="form-control" required>
                                                    <option value="">--select one --</option>
                                                    @foreach ($mainStatuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            @if ($application->main_status_id == $status->id) {{ 'selected' }} @endif>
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                    @error($mainStatus)
                                                    <span style="color:red">{{$message}}</span>
                                                    @enderror
                                                </select>
                                            </div>
                                            <div class="form-gorup">

                                                <select name="subStatus" class="form-control" wire:model.lazy="subStatus" required>
                                                    <option value="">--select one --</option>
                                                    
                                                </select>
                                                @error($subStatus)
                                                <span style="color:red">{{$message}}</span>
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
                                        value.id + '" selected>' + value.name + '</option>');
                                });
                            },
                        });

                    } else {
                        console.log('AJAX load did not work');
                    }
                });


            });
        </script>
    @endpush
</div>

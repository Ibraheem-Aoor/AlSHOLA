<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Job Details</strong><small></small>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">General Information</a>
                                        <a class="nav-item nav-link active show" id="custom-nav-profile-tab"
                                            data-toggle="tab" href="#custom-nav-profile" role="tab"
                                            aria-controls="custom-nav-profile" aria-selected="true">Descreption</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Requirements</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-responsibilities" role="tab"
                                            aria-controls="custom-nav-contact"
                                            aria-selected="false">Responsebilities</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-attachments" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Attachments</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-notes" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Previous Notes</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-actions" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Actions</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade" id="custom-nav-home" role="tabpanel"
                                        aria-labelledby="custom-nav-home-tab">
                                        <p class="text-center">
                                        <div class="row mb-3 text-center">
                                            <label for="inputEmail3" class="">Job
                                                Title:</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="{{ $job->title }}" class="form-control"
                                                    id="inputEmail3" readonly>
                                            </div>
                                            <label for="inputPassword3" class="col-form-label">Salary:</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="{{ $job->Salary }}" class="form-control"
                                                    id="inputPassword3" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <label for="inputPassword3" class="col-form-label">Location:</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="{{ $job->location }}" class="form-control"
                                                    id="inputPassword3" readonly>
                                            </div>
                                            <label for="inputPassword3" class="col-form-label">Job
                                                Nature:</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="{{ $job->nature }}" class="form-control"
                                                    id="inputPassword3" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <label for="inputPassword3" class="col-form-label">Vacancy:</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="{{ $job->vacancy }}" class="form-control"
                                                    id="inputPassword3" readonly>
                                            </div>
                                            <label for="inputPassword3" class="col-form-label">End Date:</label>
                                            <div class="col-sm-4">
                                                <input type="text" value="{{ $job->end_date }}" class="form-control"
                                                    id="inputPassword3" readonly>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade active show" id="custom-nav-profile" role="tabpanel"
                                        aria-labelledby="custom-nav-profile-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Job Descreption</label><br>
                                            <textarea readonly class="form-control">{{ $job->description }}</textarea>
                                        </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Job Requirements</label><br>
                                            <textarea readonly class="form-control">{{ $job->requirements }}</textarea>
                                        </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-responsibilities" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Job Responsebilities</label><br>
                                            <textarea readonly class="form-control">{{ $job->responsibilities }}</textarea>
                                        </div>
                                        </p>
                                    </div>


                                    <div class="tab-pane fade" id="custom-nav-notes" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="col-sm-12 text-center">
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
                                                        @forelse ($job->notes->sortByDesc('id') as $note)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $note->user->name }}</td>
                                                                <td>{{ $note->created_at }}</td>
                                                                <td><a class="btn btn-outline-primary"
                                                                        data-message="{{ $note->message }}"
                                                                        data-toggle="modal" href="#exampleModal_5"><i
                                                                            class="fa fa-eye"></i> show
                                                                        message</a></td>
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
                                                        @forelse ($job->attachments as $attachment)
                                                            <tr>
                                                                <th scope="row">{{ $i++ }}</th>
                                                                <td>{{ $attachment->name }}</td>
                                                                <td>{{ $attachment->user->name }}</td>
                                                                <td>{{ $attachment->created_at }}</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button
                                                                            class="btn btn-secondary dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            Actions
                                                                        </button>
                                                                        <ul class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            {{-- <li><a class="dropdown-item" href="#"
                                                                                    wire:click="openAttachment('{{ $attachment->name }}')">Open</a>
                                                                            </li> --}}
                                                                            <li><a class="dropdown-item" href="#"
                                                                                    wire:click="downloadAttachment('{{ $attachment->name }}')">Download</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item" href="#"
                                                                                    wire:click="deleteAttachment('{{ $attachment->name }}')">Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
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

                                    <div class="tab-pane fade" id="custom-nav-actions" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <p>
                                        <div class="form-group">
                                            <label for="">Actions:</label><br>
                                            <button class="btn btn-warning col-sm-12 mb-2" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Return To Employer</button>
                                            <a class="btn btn-primary col-sm-12 mb-2"
                                                href="{{ route('admin.job.details.edit', $job->id) }}">Edit Some
                                                Details</a>
                                            <a href="{{ route('talent.recommend', $job->id) }}"
                                                class="btn btn-success col-sm-12 mb-2">Accept & Find
                                                Talents</a>
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
                                        <form wire:submit.prevent="returnJobWithNote()">
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
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send Note</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
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
            $('#exampleModal_5').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var message = button.data('message')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #message').val(message);
            })
        </script>
    @endpush
</div>

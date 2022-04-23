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
                                                                            QActions
                                                                        </button>
                                                                        <ul class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <li><a class="dropdown-item"
                                                                                    href="#" wire:click="openAttachment('{{$attachment->name}}')">Open</a></li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="#" wire:click="downloadAttachment('{{$attachment->name}}')" >Download</a></li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="#">Delete</a>
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
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

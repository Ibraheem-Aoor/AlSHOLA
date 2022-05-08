<div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert"></div>
                                @endif
                                <h4 class="box-title">All Application in Visa Stage</h4 >
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Talent_Name</th>
                                                <th>Talent_Email</th>
                                                <th>Job_Serial_Number</th>
                                                <th>Accepted_At</th>
                                                <th>Number_Of_Notes</th>
                                                <th>cover_letter</th>
                                                <th>CV</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($applications as $application)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        {{ $application->user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $application->user->email }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.job.details', $application->job->id) }}"
                                                            class="text-info">{{ $application->job->post_number }}</a>
                                                    </td>
                                                    <td>{{ $application->created_at }}</td>
                                                    <td><a
                                                            href="{{ route('admin.application.notes.all', $application->id) }}">{{ $application->notes_count }}</a>
                                                    </td>
                                                    <td>{{ Str::limit($application->cover_letter, 40, '...') }}
                                                    </td>
                                                    <td>{{ $application->resume }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-info"
                                                            wire:click="setCurrentApplicationId({{ $application->id }})"
                                                            data-application="{{ $application->id }}"
                                                            data-toggle="modal" href="#exampleModal_5"><i
                                                                class="fa fa-note"></i>
                                                            Send Note</a>
                                                        <button class="btn btn-outline-primary " href="#"
                                                            wire:click="downloadCv('{{ $application->resume }}' , '{{ $application->job_id }}')"><i
                                                                class="fa fa-download"></i> CV</button>
                                                        <a class="btn btn-outline-primary "
                                                            href="{{ route('admin.application.attachments.all', $application->id) }}"><i
                                                                class="fa fa-file"></i> Attachments</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center alert alert-warning">No
                                                        Records
                                                        Yet!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $applications->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col-lg-8 -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Message:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form wire:submit.prevent="sendNoteToAppliedTalent()">
                                <div class="modal-body">
                                    <textarea class="form-control" cols="30" rows="10" wire:model.lazy="note"></textarea>
                                    @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">SEND</button>
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
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>

        <script>
            $('#exampleModal_5').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var application = button.data('application')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #application').val(application);
            })
        </script>
    @endpush


</div>

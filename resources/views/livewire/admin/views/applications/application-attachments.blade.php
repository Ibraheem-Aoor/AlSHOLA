<div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Uploaded Attachments </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>User_Name</th>
                                                <th>User_Email</th>
                                                <th>File</th>
                                                <th>Type</th>
                                                <th>Send_Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($attachments as $file)
                                                <tr>
                                                    <td class="serial">{{ $i++ }}</td>
                                                    <td>
                                                        {{ $file->user->name }} <span class="text-success">
                                                            ({{ $file->user->type }})
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ $file->user->email }}
                                                    </td>
                                                    <td>
                                                        {{ $file->name }}
                                                    </td>
                                                    <td>
                                                        {{ $file->type }}
                                                    </td>
                                                    <td>
                                                        {{ $file->created_at }}
                                                    </td>
                                                    <td>
                                                        <a title="download"
                                                        href="{{ route('admin.application.attachment.download', ['id' => $application_id, 'fileName' => $file->name]) }}"
                                                            class="btn btn-primary"> <i class="fa fa-download"></i>
                                                            </a>
                                                        <a title="open"
                                                        href="{{ route('admin.application.attachment.open', ['id' => $application_id, 'fileName' => $file->name]) }}"
                                                            class="btn btn-success">
                                                            <i class="fa fa-eye"></i></a>

                                                        <a title="delete"
                                                        wire:click.prevent="deleteFile('{{$file->id}}')"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-trash"></i></a>

                                                        {{-- @switch($file->user->type)
                                                            @case('Employer')
                                                                @if (!$file->is_forwarded_talent)
                                                                    <a wire:click="passAttachmentTo('talent' , '{{ $file->id }}')"
                                                                        class="btn btn-primary"> <i class="fa fa-download"></i>
                                                                        Forward To Talent</a>
                                                                @else
                                                                    <span class="badge badge-complete">Forwarded</span>
                                                                @endif
                                                            @break

                                                            @case('Talented')
                                                                @if (!$file->is_forwarded_employer)
                                                                    <a wire:click="passAttachmentTo('employer' , '{{ $file->id }}')"
                                                                        class="btn btn-primary"> <i class="fa fa-download"></i>
                                                                        Forward To Employer</a>
                                                                @else
                                                                    <span class="badge badge-complete">Forwarded</span>
                                                                @endif
                                                            @break
                                                        @endswitch --}}
                                                    </td>
                                </div>
                            </div>

                            </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center alert alert-warning">No Records
                                    Yet!
                                </td>
                            </tr>
                            @endforelse
                            </tbody>
                            </table>
                            {{ $attachments->links() }}
                        </div> <!-- /.table-stats -->
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

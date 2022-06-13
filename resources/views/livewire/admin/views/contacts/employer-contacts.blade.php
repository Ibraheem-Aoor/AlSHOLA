<div>
    @section('title', 'AlSHLOA - Admin | Employers Contacts')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Client Queries</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>subject</th>
                                                <th>user_name</th>
                                                <th>user_email</th>
                                                <th>message</th>
                                                <th>Send_date</th>
                                                <th>ِActions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($contacts as $contact)
                                                <tr>
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $contact->subject }}
                                                    </td>
                                                    <td><span>{{ $contact->user->name }}</span>
                                                    <td><span>{{ $contact->user->email }}</span>
                                                    <td>{{ Str::limit($contact->message, 40, '...') }}
                                                    </td>
                                                    <td>{{ $contact->created_at }}</td>
                                                    <td>
                                                        <a data-toggle="modal" data-message="{{ $contact->message }}"
                                                            href="#exampleModal_5" class="text-primary"><i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="#" class="text-danger"
                                                            wire:click="deleteContact('{{ $contact->id }}')"><i
                                                                class="fa fa-trash"></i></a>
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
                                    {{ $contacts->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->


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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
@endpush

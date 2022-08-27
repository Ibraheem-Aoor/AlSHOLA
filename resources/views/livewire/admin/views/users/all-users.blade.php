<div>
    @section('title', 'ALSHOALA - Admin | USERS LIST')
    @push('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endpush
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Registerd Users</h4>
                            </div>
                            <div class="card-body--">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Type:</label>
                                            <select class="form-control  mb-2 p-2" wire:model.lazy="intendedUsersType">
                                                <option value="">All</option>
                                                <option value="Client">Clinets</option>
                                                <option value="Agent">Agents</option>
                                                <option value="Broker">Brokers</option>
                                                <option value="Admin">Admins</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Order by:</label>
                                            <select class="form-control  mb-2 p-2" wire:model.lazy="orderBy">
                                                <option value="id">Default</option>
                                                <option value="name">Name</option>
                                                <option value="created_at">Date</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-stats order-table ov-h">
                                    <table class="table" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Name</th>
                                            <th>Company_Name</th>
                                            <th>User_ID</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse($users as $user)
                                            <tr>
                                                <td class="serial">{{ $i++ }}</td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->company->name ?? '' }}
                                                </td>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    @if ($user->status == 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Blocked</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->id != Auth::id())
                                                        @if ($user->status == 'blocked')
                                                            <a href="#" class="btn btn-outline-success"
                                                               wire:click="activeUser('{{ $user->id }}')"><i
                                                                    class="fa fa-check" style="color:green;"></i>
                                                                Active</a>
                                                        @else
                                                            <a href="#" class="btn btn-outline-danger"
                                                               wire:click="blockUser('{{ $user->id }}')"><i
                                                                    class="fa fa-circle" style="color:red;"></i>
                                                                block</a>

                                                        @endif
                                                    @endif
                                                    <a data-user="{{$user->name}}" data-id="{{$user->id}}"
                                                       data-toggle="modal" href="#exampleModal_5"
                                                       class="btn btn-sm btn-outline-primary"><i
                                                            class="fa fa-envelope"></i></a>
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
                                    {{ $users->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>


    <!--SHOW NOTE  Modal -->
    <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mail Users:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.mail.send') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" id="user_id" name="user_id" hidden>
                        <div class="form-group">
                            <label>Subject:</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Message:</label>
                            <textarea class="form-control" name="message" required>
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label>Attachments:</label>
                            <input class="form-control" type="file" name="attachments[]" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-success">Continue</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End SHOW NOTE  Modal -->


    @push('js')

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

        <script>
            $('#exampleModal_5').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var user = button.data('user');
                var user_id = button.data('id');
                console.log(user_id);
                // var description = button.data('description')
                var modal = $(this)
                modal.find('h5').text("Mail " + user);
                modal.find('.modal-body #user_id').val(user_id);
            });
        </script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    @endpush

</div>

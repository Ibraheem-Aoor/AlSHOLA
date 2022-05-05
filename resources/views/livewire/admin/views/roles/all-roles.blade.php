<div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Registerd Roles</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Role-Name</th>
                                                <th>Number_Of_Permessions</th>
                                                <th>creation date</th>
                                                <th>ِActions</th>
                                                <th><a href="{{ route('roles.add') }}" class="btn btn-info"><i
                                                            class="fa fa-plus"></i> New</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($roles as $role)
                                                <tr>
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $role->name }}
                                                    </td>
                                                    <td> <span class="product">{{$role->permissions->count()}}</span>
                                                    </td>
                                                    <td><span>{{ $role->created_at }}</span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-primary"
                                                            data-name="{{ $role->name }}"
                                                            data-permissions="{{ $role->permissions()->pluck('name') }}"
                                                            data-toggle="modal" href="#exampleModal_5"><i
                                                                class="fa fa-eye"></i> Details
                                                        </a>

                                                        <a href="{{ route('roles.edit', $role->id) }}"
                                                            class="btn btn-outline-success"><i
                                                                class="fa fa-edit"></i> Edit</a>
                                                    </td>
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
                                </div> <!-- /.table-stats -->
                                {{ $roles->links() }}
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Role Details:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Role Name:</label>
                            <input type="text" class="form-control" id="name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Permessions:</label>
                            <textarea name="" id="permissions" cols="30" rows="10" class="form-control" readonly></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                var name = button.data('name')
                var permissions = button.data('permissions')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #permissions').val(permissions);
            })
        </script>
    @endpush

</div>

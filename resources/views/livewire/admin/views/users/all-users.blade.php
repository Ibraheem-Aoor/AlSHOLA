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
                                                            <a data-toggle="modal"  data-target="exampleModal_5"  class="btn btn-sm btn-primary"><i
                                                                    class="fa fa-envelope"></i></a>
                                                        @endif
                                                    @endif
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
                    <h5 class="modal-title" id="exampleModalLabel">Message:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.invoice.select-payer') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" id="job" name="job_id" hidden>
                        <label for="">Issue To:</label>
                        <select name="payer" class="form-control">
                            <option value="">-- select one --</option>
                            <option value="client">Client</option>
                            <option value="agent">Agent</option>
                        </select>
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
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    @endpush

</div>

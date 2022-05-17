<div>
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
                                    <table class="table ">
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
                                    {{ $users->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>
</div>

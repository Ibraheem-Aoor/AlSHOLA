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
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Name</th>
                                                <th>Company_Name</th>
                                                <th>User_ID</th>
                                                <th>Status</th>
                                                <th><a href="{{ route('users.add') }}" class="btn btn-info"><i
                                                            class="fa fa-plus"></i> New</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($users as $user)
                                                <tr>
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $user->company->name ?? ''}}
                                                    </td>
                                                    <td>{{ $user->id }}</td>

                                                    {{-- <td>
                                                        @forelse ($user->roles as $role)
                                                            {{ $role->name . ' , ' }}
                                                        @empty
                                                            @if ($user->type == 'admin')
                                                                <span class="bade badge-warning">No Role</span>
                                                            @else
                                                                <span class="bade badge-info" style="padding: 2px">{{$user->type}}</span>
                                                            @endif
                                                        @endforelse
                                                    </td> --}}
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

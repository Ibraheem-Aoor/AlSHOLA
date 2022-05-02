<div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">All Registerd Talents</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>join_date</th>
                                                <th>ِActions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($allTalents as $talent)
                                                <tr>
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $talent->name }}
                                                    </td>
                                                    <td>{{ $talent->email }}</td>
                                                    <td>
                                                        @if ($talent->status == 'active')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Blocked</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $talent->created_at }}</td>
                                                    <td>
                                                        @if ($talent->status == 'blocked')
                                                            <a href="#" class="btn btn-outline-success"
                                                                wire:click="activeUser('{{ $talent->id }}')"><i
                                                                    class="fa fa-check" style="color:green;"></i>
                                                                Active</a>
                                                        @else
                                                            <a href="#" class="btn btn-outline-danger"
                                                                wire:click="blockUser('{{ $talent->id }}')"><i
                                                                    class="fa fa-circle" style="color:red;"></i>
                                                                block</a>
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
                                    {{ $allTalents->links() }}
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>
</div>

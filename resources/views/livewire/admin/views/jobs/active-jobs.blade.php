<div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Active Job Posts</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Publisher</th>
                                                <th>Location</th>
                                                <th>Salary</th>
                                                <th>creation date</th>
                                                <th>Status</th>
                                                <th>ِActions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            <tr>
                                                @forelse($jobs as $job)
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $job->title }}
                                                    </td>
                                                    <td>{{ $job->user->name }}</td>
                                                    <td> <span class="name">{{ $job->salary }}</span> </td>
                                                    <td> <span class="product">{{ $job->location }}</span>
                                                    </td>
                                                    <td><span class="count">{{ $job->salary }}</span></td>
                                                    <td><span class="count">{{ $job->created_at }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-complete">{{ $job->status }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.job.details', $job->id) }}"
                                                            class="btn btn-primary">Details</a>
                                                    </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center alert alert-warning">No Records Yet!
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->

                </div>
            </div>
        </div>
    </div>
</div>

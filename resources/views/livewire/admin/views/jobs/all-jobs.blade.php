<div>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    @php
                        $title = '';
                    @endphp
                    @switch(Route::currentRouteName())
                        @case('admin.jobs.completed')
                            @php
                                $title = 'Completed';
                            @endphp
                        @break

                        @case('admin.jobs.all')
                            @php
                                $title = 'All';
                            @endphp
                        @break

                        @case('admin.jobs.latest')
                            @php
                                $title = 'Latest';
                            @endphp
                        @break

                        @case('admin.jobs.active')
                            @php
                                $title = 'Active';
                            @endphp
                        @break

                        @case('admin.jobs.pending')
                            @php
                                $title = 'Pending';
                            @endphp
                        @break

                        @case('admin.jobs.cancelled')
                            @php
                                $title = 'Cancelled';
                            @endphp
                        @break

                        @default
                    @endswitch
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">{{ $title }} Job Posts</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Number</th>
                                                <th>Sector</th>
                                                <th>Title</th>
                                                <th>number_of_applications</th>
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
                                            @forelse($jobs as $job)
                                                <tr>
                                                    <td class="serial">{{ $i }}</td>
                                                    <td>
                                                        {{ $job->post_number }}
                                                    </td>
                                                    <td>
                                                        {{ $job->title->sector->name }}
                                                    </td>
                                                    <td>
                                                        {{ $job->title->name }}
                                                    </td>
                                                    <td>
                                                        {{ $job->applications_count }}
                                                    </td>
                                                    <td>{{ $job->user->name }}</td>
                                                    <td> <span class="product">{{ $job->nationality->name }}</span>
                                                    <td> <span class="name">{{ $job->salary }}</span> </td>
                                                    </td>
                                                    <td><span>{{ $job->created_at }}</span>
                                                    </td>
                                                    @php
                                                        $badgeColor = '';
                                                    @endphp
                                                    @switch($job->status)
                                                        @case('active')
                                                            @php
                                                                $badgeColor = 'complete';
                                                            @endphp
                                                        @break
                                                        @case('completed')
                                                            @php
                                                                $badgeColor = 'primary';
                                                            @endphp
                                                        @break
                                                        @case('cancelled')
                                                            @php
                                                                $badgeColor = 'danger';
                                                            @endphp
                                                        @break
                                                        @case('pending')
                                                            @php
                                                                $badgeColor = 'pending';
                                                            @endphp
                                                        @break
                                                    @endswitch
                                                    <td>
                                                        <span class="badge badge-{{$badgeColor}}">{{ $job->status }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.job.details', $job->id) }}"
                                                            class="btn btn-primary">Details</a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="text-center alert alert-warning">No Records
                                                            Yet!
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

<div>
    @section('title', 'AlSHLOA - Admin | DEMAND LIST')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Demand List</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>DM SR </th>
                                                <th>Company </th>
                                                <th>Total Qty</th>
                                                <th>Supply</th>
                                                <th>Balance</th>
                                                <th>Client_Name</th>
                                                <th>Status</th>
                                                <th>Open Date</th>
                                                <th>
                                                    Actions
                                                </th>
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
                                                        {{ $job->user->company->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $job->qty() }}
                                                    </td>
                                                    <td>
                                                        {{ 'UNKOWN' }}
                                                    </td>
                                                    <td>
                                                        {{ 'UNKOWN' }}
                                                    </td>
                                                    <td>{{ $job->user->name }}</td>
                                                    <td>
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

                                                            @default
                                                                @php
                                                                    $badgeColor = 'warning';
                                                                @endphp
                                                        @endswitch

                                                        <span
                                                            class="badge badge-{{ $badgeColor }}">{{ $job->status }}</span>
                                                    </td>
                                                    <td><span>{{ $job->created_at }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.demand.details', $job->id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.send-job-to-agent', $job->id) }}"
                                                            title="send to agent"><i
                                                                class="fa fa-location-arrow"></i></a>
                                                    </td>
                                                    {{-- <td>
                                                        <span
                                                            class="badge badge-{{ $badgeColor }}">{{ $job->status }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.job.details', $job->id) }}"
                                                            class="btn btn-primary">Details</a>
                                                    </td> --}}
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="text-center alert alert-warning">No
                                                            Records
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

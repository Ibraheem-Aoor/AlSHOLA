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
                                                        {{ $job->qty() - $job->applications->where('forwarded', true)->count() }}
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


                        {{-- <!--SHOW NOTE  Modal -->
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
                                    <div class="modal-body">
                                        <input type="text" id="job">
                                        <select name="" id="" class="form-control">
                                                @foreach ($targetJob->applications as $application)
                                                    <option value="{{ $application->user->id }}">
                                                        {{ $application->user->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
 --}}




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
                    var job = button.data('job')
                    // var description = button.data('description')
                    var modal = $(this)
                    modal.find('.modal-body #job').val(job);
                });
            </script>
        @endpush
    </div>

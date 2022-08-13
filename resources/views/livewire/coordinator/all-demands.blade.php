<div class="container">
    <div class="col-sm-12"></div>
    <div class="row  mt-5">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>All Demands</strong><small></small>
                </div>
                <div class="card-body">
                    <div class="col-sm-12 text-center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Demand No.</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">status</th>
                                        <th scope="col">creation_date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        $jobs = $broker
                                            ->brokerJobs()
                                            ->with(['user', 'subStatus'])
                                            ->paginate(10);
                                    @endphp
                                    @forelse ($jobs->take(10) as $job)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $job->post_number }}</td>
                                            <td>{{ $job->user->name }}</td>
                                            <td>{{ $job->subStatus->name }}</td>
                                            <td>{{ $job->created_at }}</td>
                                            {{-- <td>
                                                <a href="{{ route('admin.demand.details', $job->id) }}"
                                                    class="btn-sm btn-outline-primary"><i class="fa fa-eye"></i></a>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="alert alert-warning text-center bg-dark"
                                                style="color:#fff">
                                                No Records Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $jobs->links() !!}
                        </div>
                    </div>
                    </p>

                    {{-- End Demands --}}

                </div>
            </div>
        </div>
    </div>


</div>


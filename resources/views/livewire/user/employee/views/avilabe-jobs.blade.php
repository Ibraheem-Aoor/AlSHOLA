<div>
    @section('title', 'ALSHOALA | AVILABLE JOBS')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Avilable Jobs Recommended For You</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">DSR</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Supply</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Creation_date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($avlialbeJobs as $job)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $job->post_number }}</td>
                                        <td>{{ $job->qty() }}</td>
                                        <td>
                                            {{ $job->applications->count() }}
                                        </td>

                                        <td>
                                            {{ $job->qty() - $job->applications->count() }}
                                        </td>

                                        <td>
                                            <a href="{{ route('employer.job.applications.all', $job->id) }}">
                                                {{ $job->user->name }}
                                            </a>
                                        </td>
                                        <td>{{ $job->created_at }}</td>
                                        <td>{{ $job->subStatus->name }}</td>
                                        <td>
                                            <a href="{{ route('employee.job.details', $job->id) }}"
                                                class=" btn btn-outline-primary" href="#"><i
                                                    class="fa fa-eye"></i>
                                                Details</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-warning text-center bg-dark"
                                            style="color:#fff">
                                            No Records Yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $avlialbeJobs->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

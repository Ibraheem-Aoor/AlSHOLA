<div>
    @section('title', 'ALSHOLA | AVILABLE JOBS')
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
                                    <th scope="col">Job_Number</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Clinet_Name</th>
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
                                        <td>{{ $job->title->name }}</td>
                                        <td>{{ $job->user->name }}</td>
                                        <td>{{ $job->status }}</td>
                                        <td>
                                            <a href="{{ route('employee.job.details', $job->id) }}"
                                                class=" btn btn-outline-primary" href="#"><i class="fa fa-eye"></i>
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

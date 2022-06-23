<div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Pending Jobs</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($jobs as $job)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $job->subStatus->name }}</td>
                                        <td><a href="{{ route('job.details', $job->id) }}"
                                                class="btn btn-info">Details</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-warning text-center bg-dark" style="color:#fff">
                                            No Records Yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                @forelse ($avlialbeJobs as $job)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $job->status }}</td>
                                        <td>
                                            ACtion
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

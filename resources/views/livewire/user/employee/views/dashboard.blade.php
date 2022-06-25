<div>
    @section('title', 'ALSHOALA | Dashboard')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">{{ 'WELCOME BACK ' . Auth::user()->name }}
            </h1>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Avilable Job Posts</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Returned Jobs</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Active Jobs</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Applications</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total  Returned Applications</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total  Fees </p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">

        <div iv class="col-sm-12 text-center mb-5">
            <h2 class="text-green">Latest Job Posts Recommend For You</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col">Creation_date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                            $activeJobs = [];
                        @endphp
                        @forelse ($avlialbeJobs as $job)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $job->subJobs->first()->title->sector->name }}</td>
                                <td>{{ $job->subJobs->first()->title->name }}</td>
                                <td>{{ $job->created_at }}</td>
                                <td>{{ $job->subStatus->name }}</td>
                                <td>
                                    <a href="{{ route('employee.job.details', $job->id) }}"
                                        class=" btn btn-outline-primary" href="#"><i class="fa fa-eye"></i>
                                        Details</a>
                                </td>
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
@push('js')
    <script>
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Completed', 'Active', 'Cancelled'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(0, 255, 66, 0.87)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 0, 0, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(0, 255, 66, 0.07)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 0, 0, 1)',
                    ],
                    borderWidth: 1
                }]
            },

            options: {
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
            }
        });
    </script>
@endpush
</div>

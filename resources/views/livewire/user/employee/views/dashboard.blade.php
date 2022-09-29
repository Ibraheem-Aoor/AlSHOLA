<div>
    @section('title', 'ALSHOALA | Dashboard')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">{{ 'WELCOME BACK ' . Auth::user()->name }}
            </h1>
            <div class="row wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-sm-8">
                    <canvas id="myChart" width="500" height="200"></canvas>
                </div>
                <div class="col-sm-4">
                    <canvas id="myChart_2"></canvas>
                </div>
            </div>
            {{-- <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Avilable Demands</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Returned Demands</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Active Demands</p>
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
                            <p class="mb-2">Total Returned Applications</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Fees </p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>


    <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">

        <div iv class="col-sm-12 text-center mb-5">
            <h2 class="text-green">Latest Demands Recommend For You</h2>
            <div class="table-responsive">
                <table class="table" id="myTable">
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
                                    {{  $job->supplied() }}
                                </td>

                                <td>
                                    {{ $job->qty() - $job->supplied() }}
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
                                        class=" btn btn-outline-primary" href="#"><i class="fa fa-eye"></i>
                                        Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="alert alert-warning text-center bg-dark" style="color:#fff">
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
        const ctx_2 = document.getElementById('myChart_2').getContext('2d');
        const myChart_2 = new Chart(ctx_2, {
            type: 'pie',
            data: {
                labels: ['Under Proccess', 'Cancelled', 'Completed'],
                datasets: [{
                    label: 'Avilable Deamands',
                    data: [{{$underProcessJobs}}, {{$cancelledJobs}}, {{$completedJobs}}],
                    backgroundColor: [
                        'rgb(255, 205, 86)',
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                }]
            },
        });
    </script>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Applications'],
                datasets: [{
                        label: 'Active Applications',
                        data: [{{$acitveApplicationsCount}}],
                        backgroundColor: [
                            'rgba(96, 240, 135, 0.2)', ,
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Hold Applications',
                        data: [{{$holdApplicationsCount}}],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Cancelled Applications',
                        data: [{{$cancelledApplicationsCount}}],
                        backgroundColor: [
                            'rgba(245, 96, 96, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Completed Applications',
                        data: [{{$completedApplicationsCount}}],
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    width: 20,
                    height: 20,
                }
            }
        });
    </script>

@endpush
</div>

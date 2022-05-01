<div>
    @section('title', 'Dashboard')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">{{ 'WELCOME BACK ' . Auth::user()->name }}
            </h1>
            <div class="row wow fadeInUp" data-wow-delay="0.1s">

                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Job Posts</p>
                            <h6 class="mb-0">34</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Applications</p>
                            <h6 class="mb-0">15</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Candidates</p>
                            <h6 class="mb-0">287</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Completed Jobs</p>
                            <h6 class="mb-0">122</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Cacelled Jobs</p>
                            <h6 class="mb-0">122</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Pedning Jobs</p>
                            <h6 class="mb-0">122</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Returned Jobs</p>
                            <h6 class="mb-0">122</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Active Jobs</p>
                            <h6 class="mb-0">122</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Fees</p>
                            <h6 class="mb-0">122</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 wow fadeInUp mt-3" data-wow-delay="0.1s">
                <div iv class="col-sm-12 text-center mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-green">Latest Job Posts</h2>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Creation_date</th>
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
                                                <td>{{ $job->created_at }}</td>
                                                <td>{{ $job->status }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li><a href="{{ route('job.show', $job->id) }}"
                                                                    class="dropdown-item badge bg-primary"
                                                                    href="#">Details</a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('job.destroy', $job) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item badge bg-danger"><i
                                                                            class="fa fa-trash"></i> Delete</button>
                                                                </form>
                                                            </li>
                                                            @if ($title = 'Returned')
                                                                <li><a class="dropdown-item badge bg-info"
                                                                        href="{{ route('employer.job.notes', $job->id) }}"><i
                                                                            class="fa fa-eye"></i> Show Notes</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
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
                            </div>
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
                type: 'doughnut',
                const data = {
                        labels: [
                            'Red',
                            'Blue',
                            'Yellow'
                        ],
                        datasets: [{
                            label: 'My First Dataset',
                            data: [300, 50, 100],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }]
                    },
            });
        </script>
    @endpush
</div>

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
        </div>
        {{-- <div class="row wow fadeInUp" data-wow-delay="0.1s">

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
            </div> --}}

        <div class="row g-4 wow fadeInUp mt-3" data-wow-delay="0.1s">
            <div iv class="col-sm-12 text-center mb-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-green">Latest Job Posts</h2>
                    </div>
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">DSR</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Supply</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Applications</th>
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
                                                    {{ $job->applications_count }}
                                                </a>
                                            </td>
                                            <td>{{ $job->created_at }}</td>
                                            <td>{{ $job->subStatus->name }}</td>
                                            @if ($job->subStatus->name != 'Demand Cancelled' && $job->subStatus->name != 'Demand Complete')
                                                <td>
                                                    <a href="{{ route('job.show', $job->id) }}" title="details"
                                                        class="badge bg-primary" href="#"><i
                                                            class="fa fa-eye"></i></a>

                                                    {{-- <a href="#" title="delete"
                                                        onclick="event.preventDefault();document.getElementById('delete-form').submit();"
                                                        class=" badge bg-danger"><i class="fa fa-trash"></i></a> --}}
                                                    @if ($job->subStatus->name != 'Demand Under Proccess')
                                                        <a class="badge badge-success text-primary"
                                                            href="{{ route('job.edit', $job->id) }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    @endif
                                                    <a class=" badge bg-info" title="notes"
                                                        href="{{ route('employer.job.notes', $job->id) }}"><i
                                                            class="fa fa-file"></i></a>
                                                    <a href="#exampleModal_5" data-toggle="modal"
                                                        title="upload attachment" data-number="{{ $job->post_number }}"
                                                        data-id="{{ $job->id }}"><i class="fa fa-upload"></i>
                                                    </a>

                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="alert alert-warning text-center bg-dark"
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


        <!-- Modal -->
        <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Attachment:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('job.attachment.upload') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-sm-6">
                                <label for="" style="font-weight: 600">Job Title:</label>
                                &nbsp; &nbsp; <input type="text" readonly id="title">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" style="font-weight: 600">number:</label>
                                &nbsp; &nbsp; <input type="text" readonly id="number">
                                <input type="text" readonly name="id" id="id" hidden>

                            </div>
                            <div class="form-group col-sm-6 mb-3">
                                <label for="" style="font-weight: 600">Attachment:</label>
                                &nbsp; &nbsp; <input type="file" name="attachments[]" multiple required>
                            </div>
                            <div class="form-group col-sm-6 text-center" style="width: 100%">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-upload"></i>
                                    UPLOAD</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@push('js')
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

    <script>
        $('#exampleModal_5').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var title = button.data('title')
            var number = button.data('number')
            var id = button.data('id')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #number').val(number);
            modal.find('.modal-body #id').val(id);
        })
    </script>



    <script>
        const ctx_2 = document.getElementById('myChart_2').getContext('2d');
        const myChart_2 = new Chart(ctx_2, {
            type: 'pie',
            data: {
                labels: ['Under Proccess', 'Cancelled', 'Completed'],
                datasets: [{
                    label: 'Avilable Jobs',
                    data: [{{ $underProcessJobs }}, {{ $cancelledJobs }}, {{ $completedJobs }}],
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
                        data: [{{ $acitveApplicationsCount }}],
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
                        data: [{{ $holdApplicationsCount }}],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Cancelled Applications',
                        data: [{{ $cancelledApplicationsCount }}],
                        backgroundColor: [
                            'rgba(245, 96, 96, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Completed Applications',
                        data: [{{ $completedApplicationsCount }}],
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

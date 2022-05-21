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
                            @if (Session::has('error'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> {{ Session::get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">number</th>
                                            <th scope="col">Sector</th>
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
                                                <td>{{ $job->post_number }}</td>
                                                <td>{{ $job->title->sector->name }}</td>
                                                <td>{{ $job->title->name }}</td>
                                                <td>{{ $job->created_at }}</td>
                                                <td>{{ $job->status }}</td>
                                                <td>
                                                    <a href="{{ route('job.show', $job->id) }}" title="details"
                                                        class="badge bg-primary" href="#"><i class="fa fa-eye"></i></a>

                                                    <a href="#" title="delete" onclick="event.preventDefault();document.getElementById('delete-form').submit();" class=" badge bg-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                            <form id="delete-form"  style="display: none;" action="{{ route('job.destroy', $job) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                            </form>

                                                    <a class=" badge bg-info" title="notes"
                                                        href="{{ route('employer.job.notes', $job->id) }}"><i
                                                            class="fa fa-file"></i></a>

                                                    <a href="{{ route('employer.pdf.generate', $job->id) }}" title="print document"
                                                        class=" badge bg-success" href="#"><i
                                                            class="fa fa-print"></i>
                                                        </a>

                                                    <a href="#exampleModal_5" class=" badge bg-secondary" title="upload attachment to managment"
                                                        data-toggle="modal" data-title="{{ $job->title }}"
                                                        data-number="{{ $job->post_number }}"
                                                        data-id="{{ $job->id }}"><i class="fa fa-upload"></i></a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="alert alert-warning text-center bg-dark"
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
            <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore
                aria-labelledby="exampleModalLabel" aria-hidden="true">
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

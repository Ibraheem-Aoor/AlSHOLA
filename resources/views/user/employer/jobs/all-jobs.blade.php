@extends('layouts.user.employer.master')
@section('title', 'ALSHOALA | ALL JOB POSTS')

@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            @switch(Route::currentRouteName())
                @case('employer.jobs.index')
                    @php
                        $title = 'All';
                    @endphp
                @break

                @case('employer.jobs.pending')
                    @php
                        $title = 'Pending';
                    @endphp
                @break

                @case('employer.jobs.active')
                    @php
                        $title = 'Active';
                    @endphp
                @break

                @case('employer.jobs.Completed')
                    @php
                        $title = 'Completed';
                    @endphp
                @break

                @case('employer.jobs.cancelled')
                    @php
                        $title = 'Cancelled';
                    @endphp
                @break

                @case('employer.jobs.returned')
                    @php
                        $title = 'Returned';
                    @endphp
                @break

                @default
            @endswitch
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">{{ $title }} Job Posts</h1>
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

                                        <td>
                                            <a title="Details" href="{{ route('job.show', $job->id) }}"><i
                                                    class="fa fa-eye"></i></a>

                                            {{-- <a href="{{ route('job.pdf.generate', $job->id) }}"><i
                                                    class="fa fa-print"></i>
                                                </a> --}}


                                            <a href="#exampleModal_5" data-toggle="modal" title="upload attachment"
                                                data-number="{{ $job->post_number }}"
                                                data-id="{{ $job->id }}"><i class="fa fa-upload"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    </ul>
                    </div>
                @empty
                    <tr>
                        <td colspan="5" class="alert alert-warning text-center bg-dark" style="color:#fff">
                            No Records Yet
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                    </table>
                    {{ $jobs->links() }}
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
                <form action="{{ route('job.attachment.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-sm-6">
                        <label for="" style="font-weight: 600">Demand SR:</label>
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<input type="text" readonly id="number"
                            style="paadding-left:10px;margin-left:15px;">
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
</div>
@endsection

@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Demand')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Applications For Your Demands</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Job_Number</th>
                                    <th scope="col">Job_Title</th>
                                    <th scope="col">Cover_Letter</th>
                                    <th scope="col">Talent_Name</th>
                                    <th scope="col">Attachments</th>
                                    <th scope="col">CV</th>
                                    <th scope="col">Applied At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($applications as $application)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $application->job->post_number }}</td>
                                        <td>{{ $application->job->title }}</td>
                                        <td><a href="#">Cover Letter</a>
                                        </td>
                                        <td>{{ $application->user->name }}</td>
                                        <td>
                                            <a href="{{ route('employer.application.attachments' , $application->id) }}">
                                                {{ $application->attachments_count }}
                                            </a>
                                        </td>
                                        <td>{{ $application->resume }}</td>
                                        <td>{{ \Carbon\Carbon::parse($application->created_at)->format('Y-M-d')}}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a href="#exampleModal_5" class="dropdown-item badge bg-primary"
                                                            data-id="{{ $application->id }}" data-toggle="modal"
                                                            href="#">Send Note</a>
                                                    </li>
                                                    <li><a href="#" class="dropdown-item badge bg-primary"
                                                            data-id="{{ $application->id }}" data-toggle="modal"
                                                            href="#">Reject</a>
                                                    </li>
                                                    <li><a class="dropdown-item badge bg-primary" data-toggle="modal"
                                                            data-id="{{ $application->id }}"
                                                            data-title="{{ $application->job->title }}"
                                                            data-number="{{ $application->job->post_number }}"
                                                            href="#exampleModal_6">Accept</a>
                                                    </li>
                                                </ul>
                                            </div>



                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="alert alert-warning text-center bg-dark"
                                            style="color:#fff">
                                            No Records Yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal_5" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send A Note:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.applications.note.send') }}" method="POST">
                                @csrf
                                <div class="form-group col-sm-12 mb-3">
                                    <label for="" style="font-weight: 600">Message:</label>
                                    &nbsp; &nbsp;
                                    <textarea name="message" class="form-control"></textarea>
                                    <input type="text" id="id" name="application_id" hidden>
                                </div>
                                <div class="form-group col-sm-6 text-center" style="width: 100%">
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-submit"></i>
                                        SUBMIT</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>






            <!-- Modal -->
            <div class="modal fade" id="exampleModal_6" tabindex="-1" wire:ignore
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.application.upgrade') }}" method="POST">
                                @csrf
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">JobL Title: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="title">
                                    <input type="text" id="id" name="application_id">
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">Job Number: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="number">
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <p class="text-danger">Accepting This Application will upgrade it to next stage
                                        (VISA STAGE)</p>
                                </div>
                                <div class="form-group col-sm-6 text-center" style="width: 100%">
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-submit"></i>
                                        ACCEPT</button>
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
            $('#exampleModal_6').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var title = button.data('title')
                var number = button.data('number')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #title').val(title);
                modal.find('.modal-body #number').val(number);
            });
            $('#exampleModal_5').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var modal = $(this)
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

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
                                    <th scope="col">SR</th>
                                    <th scope="col">BY</th>
                                    <th scope="col">file</th>
                                    <th scope="col">date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($attachments as $file)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $file->application->job->post_number }}</td>
                                        <td>{{ $file->user->name }}</td>
                                        <td>{{ $file->name }}</td>
                                        <td>{{ $file->created_at }}</td>
                                        <td>

                                            <a title="Download"
                                                href="{{ route('application.attachment.download', ['id' => $file->application_id, 'fileName' => $file->name]) }}">
                                                <i class="fa fa-download"></i>&nbsp;
                                            </a>
                                            <a title="Download"
                                                href="{{ route('application.attachment.open', ['id' => $file->application_id, 'fileName' => $file->name]) }}">
                                                <i class="fa fa-eye"></i>&nbsp;
                                            </a>

                                            </li>
                                            <a title="Send Note" href="#exampleModal_5"
                                                data-id="{{ $file->application->id }}" data-toggle="modal"
                                                href="#"><i class="fa fa-edit"></i></a>

                                            {{-- <li><a class="dropdown-item badge bg-primary" data-toggle="modal"
                                                            data-id="{{ $file->application->id }}"
                                                            data-title="{{ $file->application->job->title }}"
                                                            data-number="{{ $file->application->job->post_number }}"
                                                            href="#exampleModal_6">Accept</a>
                                                    </li> --}}


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
                        {{ $attachments->links() }}
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
                            <form
                                action="{{ route('employer.applications.note.send', $attachments->first()->application->id) }}"
                                method="POST">
                                @csrf
                                <div class="form-group col-sm-12 mb-3">
                                    <label for="" style="font-weight: 600">Message:</label>
                                    &nbsp; &nbsp;
                                    <textarea name="message" class="form-control"></textarea>
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
            <div class="modal fade" id="exampleModal_6" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="title" readonly>
                                    <input type="text" id="id" name="application_id" hidden>
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">Job Number: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="number" readonly>
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

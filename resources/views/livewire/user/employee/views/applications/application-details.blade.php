@extends('layouts.user.employee.master')
@section('title', 'Dashboard | Application Details')
@push('css')
    <style>
        table {
            font-family: arial, sans-serif;
            font-size: 10px;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #dddddd;
        }

        .fromDiv {
            width: 100%;
        }

        .fromDiv p {
            display: inline-block;
            margin: 0px 30px;
        }
    </style>
@endpush
@section('content')
    <div>
    @section('title', 'Dashboard | Create Demand')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div>
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Application Details</strong><small> Job:
                                                    {{ $application->job->post_number }}</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="custom-tab">

                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link clickable" id="custom-nav-home-tab"
                                                                data-toggle="tab" href="#custom-nav-home" role="tab"
                                                                aria-controls="custom-nav-home"
                                                                aria-selected="false">General Information</a>

                                                            <a class="nav-item nav-link" id="custom-nav-home-tab"
                                                                data-toggle="tab" href="#custom-nav-attachments"
                                                                role="tab" aria-controls="custom-nav-home"
                                                                aria-selected="false">Attachments</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                        <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">
                                                            <div class="container">
                                                                <div class="row">
                                                                    {{-- Basic From --}}
                                                                    <div class="col-sm-12">
                                                                        <h3>Application Information</h3>
                                                                        <div class="bg-light text-center mt-2 fw-600">
                                                                            On behalf Of Al Shoala Recruitment Service
                                                                            W. L. L
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @include('application-template', [
                                                                    'application' => $application,
                                                                ])
                                                            </div>
                                                        </div>


                                                        {{-- Attachments --}}
                                                        <div class="tab-pane fade" id="custom-nav-attachments"
                                                            role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                            <p>
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
                                                                            @php
                                                                                $attachments = $application
                                                                                    ->attachments()
                                                                                    ->where('is_forwarded_talent', true)
                                                                                    ->orderByDesc('created_at')
                                                                                    ->paginate(15);
                                                                            @endphp
                                                                            @forelse ($attachments as $file)
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        {{ $i++ }}</th>
                                                                                    <td>{{ $application->job->post_number }}
                                                                                    </td>
                                                                                    <td>{{ $file->user->name }}</td>
                                                                                    <td>{{ $file->name }}</td>
                                                                                    <td>{{ $file->created_at }}</td>
                                                                                    <td>

                                                                                        <a title="Download"
                                                                                            href="{{ route('application.attachment.download', ['id' => $file->application_id, 'fileName' => $file->name]) }}">
                                                                                            <i
                                                                                                class="fa fa-download"></i>&nbsp;
                                                                                        </a>
                                                                                        </li>
                                                                                        <a title="Send Note"
                                                                                            href="#exampleModal_5"
                                                                                            data-id="{{ $file->application->id }}"
                                                                                            data-toggle="modal"
                                                                                            href="#"><i
                                                                                                class="fa fa-edit"></i></a>

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
                                                                                    <td colspan="8"
                                                                                        class="alert alert-warning text-center bg-dark"
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
                                                            </p>
                                                        </div>







                                                    </div>
                                                </div>
                                            </div>








                                            <!--
                                                Modal_1
                                                This modal is for sending notes
                                            -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" wire:ignore aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Write A
                                                                Note:</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form wire:submit.prevent="sendApplicationNote()">
                                                                <div class="form-group">
                                                                    <label for="">Note<span
                                                                            class="text-danger">*
                                                                        </span> :</label>
                                                                    <textarea class="form-control" required wire:model.lazy="note"></textarea>
                                                                    @error('note')
                                                                        <span class="text-dagner">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send
                                                                Note</button>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="exampleModal_5" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send A
                                Note:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employer.applications.note.send', $application->id) }}"
                                method="POST">
                                @csrf
                                <div class="form-group col-sm-12 mb-3">
                                    <label for="" style="font-weight: 600">Message:</label>
                                    &nbsp; &nbsp;
                                    <textarea name="message" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-sm-6 text-center" style="width: 100%">
                                    <button type="submit" class="btn btn-outline-primary"><i
                                            class="fa fa-submit"></i>
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
                            <form action="{{ route('employer.application.accept', $application->id) }}"
                                method="POST">
                                @csrf
                                {{-- <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">JobL Title: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="title" readonly>
                                    <input type="text" id="id" name="application_id" hidden>
                                </div> --}}
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="" style="font-weight: 600">Demand SR: </label>
                                    &nbsp; &nbsp; <input type="text" class="form-control" id="number" readonly
                                        value="{{ $application->job->post_number }}">
                                </div>
                                <div class="form-group col-sm-6 text-center" style="width: 100%">
                                    <button type="submit" class="btn btn-outline-primary"><i
                                            class="fa fa-submit"></i>
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



            <!-- Refuse Offer Modal -->
            <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Refuse The Offer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('employer.application.refuse', $application->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <textarea class="form-control" id="reason" name="reason" required placeholder="Tell Us The Resaon"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
            $(document).ready(function() {
                $('.clickable').click();
            });
        </script>
        <script>
            $('#exampleModal_6').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                // var title = button.data('title')
                // var number = button.data('number')
                // var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                // modal.find('.modal-body #title').val(title);
                // modal.find('.modal-body #number').val(number);
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

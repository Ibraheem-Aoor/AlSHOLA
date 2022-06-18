@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Applications For Your Job Posts</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ref</th>
                                    <th scope="col">Passport</th>
                                    <th scope="col">Agent</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attachments</th>
                                    <th scope="col">Applied At</th>
                                    <th scope="col">Actions</th>
                                    {{-- <th scope="col">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $title = [];
                                    $file_type = [];
                                @endphp
                                @forelse ($applications as $application)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $application->ref}}</td>
                                        <td>{{ $application->passport_no }}</td>
                                        <td>{{ $application->user->name }}</td>
                                        <td>{{ $application->subStatus->name }}</td>
                                        <td><a href="{{route('employer.application.attachments' , $application->id)}}">{{$application->attachments->count()}}</a></td>
                                        <td>{{ $application->created_at }}</td>
                                        <td>
                                            <a href="{{ route('employer.application.details', $application->id) }}"
                                                class="badge bg-warning" title="show details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('employer.application.pdf.generate', $application->id) }}"
                                                class="badge bg-success" title="print application"><i
                                                    class="fa fa-print"></i></a>

                                            @switch($application->subStatus->name)
                                                @case('waiting for visa')
                                                    @php
                                                        $title[$i] = 'Upload Visa File';
                                                        $file_type[$i] = 'visa';
                                                    @endphp
                                                @break

                                                @case('CV Submitted')
                                                    @php
                                                        $title[$i] = 'Upload  Offer Letter';
                                                        $file_type[$i] = 'offerLetter';
                                                    @endphp
                                                @break

                                                @case('For Selection')
                                                    @php
                                                        $title[$i] = 'Upload Offer Letter';
                                                        $file_type[$i] = 'offerLetter';
                                                    @endphp
                                                @break
                                                @default
                                                @php
                                                    $title[$i] = null;
                                                    $file_type[$i] = null;
                                                @endphp
                                            @endswitch

                                            @isset($file_type[$i])
                                                <a href="#exampleModal_5" data-title="{{ $title[$i] }}" data-toggle="modal"
                                                    data-type="{{ $file_type[$i] }}" data-id="{{ $application->id }}">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                @endisset
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
                                    <form action="{{ route('application.file.upload') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group col-sm-6 mb-3">
                                            <label for="" style="font-weight: 600" id="title"></label>
                                            <input type="text" id="vnumber" name="visa_number" class="form-control" style="display:none;" placeholder="Enter Visa Number..">
                                            &nbsp; &nbsp; <input type="file" name="file" required>
                                            <input type="text" id="type" name="file_type" hidden>
                                            <input type="text" id="id" name="id" hidden>
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
                                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                                crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                                crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

                <script>
                    $('#exampleModal_5').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var id = button.data('id')
                        var type = button.data('type')
                        var title = button.data('title')
                        console.log(title);
                        // var description = button.data('description')
                        var modal = $(this)
                        modal.find('.modal-body #id').val(id);
                        modal.find('.modal-body #type').val(type);
                        document.getElementById('title').innerHTML = title;
                        if(type == 'visa')
                            document.getElementById('vnumber').removeAttribute('style');
                            document.getElementById('vnumber').removeAttribute('name');


                    });
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

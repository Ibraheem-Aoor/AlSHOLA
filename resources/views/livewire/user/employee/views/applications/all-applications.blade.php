@extends('layouts.user.employee.master')
@section('title', 'ALSHOLA | AVILABLE JOBS')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Applications You have submited</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Job_Number</th>
                                    <th scope="col">Job_Title</th>
                                    <th scope="col">Client_Name</th>
                                    <th scope="col">Number_Of_Notes</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Applied At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $title = [];
                                    $file_type = [];
                                @endphp
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($applications as $application)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $application->job->post_number }}</td>
                                        <td>{{ $application->job->title->name }}</td>
                                        <td>{{ $application->job->user->name }}</td>
                                        <td><a
                                                href="{{ route('employee.application.notes', $application->id) }}">{{ $application->notes_count }}</a>
                                        </td>
                                        <td>{{ $application->subStatus->name }}</td>
                                        <td>{{ $application->created_at }}</td>
                                        <td>
                                            @switch($application->subStatus->name)
                                                @case('waiting for medical')
                                                    @php
                                                        $title[$i] = 'Upload Medical File';
                                                        $file_type[$i] = 'visa';
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
                                            <td colspan="8" class="alert alert-warning text-center bg-dark" style="color:#fff">
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


                {{-- Accept The Offer --}}
                <!-- Modal -->
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
                                <form action="{{ route('application.file.upload') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-sm-6 mb-3">
                                        <label for="" style="font-weight: 600" id="title">UPLOAD FILE</label>
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
                            var modal = $(this)
                            modal.find('.modal-body #id').val(id);
                            modal.find('.modal-body #type').val(type);
                            document.getElementById('title').innerHTML = title;
                        })
                    </script>
                @endpush
            </div>
        </div>
    @endsection

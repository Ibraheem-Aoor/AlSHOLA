@extends('layouts.user.employee.master')
@section('title', 'ALSHOALA | AVILABLE JOBS')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Applications You have submited</h1>
            <div class="row g-4">
                <div class="col-sm-4">
                    <select name="filter" class="form-control text-center">
                        <option value="">-- Select One -- </option>
                        <option value="Active">Active</option>
                        <option value="Hold">Hold</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="{{ route('agent-application.search') }}" method="GET">
                        @csrf
                        <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                            aria-label="Search" name="search">
                    </form>
                </div>
                <div class="col-sm-12 text-center">
                    <div class="table-responsive" id="applications_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Demand No</th>
                                    <th scope="col">Ref</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Passport</th>
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
                                @if($application->user_id != Auth::id())
                                    @continue
                                @endif
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $application->job->post_number }}</td>
                                        <td>{{ $application->ref }}</td>
                                        <td>{{ $application->full_name }}</td>
                                        <td>{{ $application->passport_no }}</td>
                                        <td>{{ $application->job->user->name }}</td>
                                        <td><a
                                                href="{{ route('employee.application.notes', $application->id) }}">{{ $application->notes_count }}</a>
                                        </td>
                                        <td>{{ $application->subStatus->name }}</td>
                                        <td>{{ $application->created_at }}</td>
                                        @if ($application->subStatus->name != 'Cancelled Application' && $application->job->subStatus->name != 'Demand Cancelled')
                                            <td>
                                                @switch($application->job->subStatus->name)
                                                    @case('Demand Under Proccess')
                                                        @php
                                                            $title[$i] = 'Upload Medical/Agreement File(s)';
                                                            $file_type[$i] = 'medical/agreement';
                                                        @endphp
                                                    @break

                                                    @default
                                                        @php
                                                            $title[$i] = null;
                                                            $file_type[$i] = null;
                                                        @endphp
                                                @endswitch
                                                <a href="{{ route('employeee.application.details', $application->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @isset($file_type[$i])
                                                    <a href="#exampleModal_5" data-title="{{ $title[$i] }}"
                                                        data-toggle="modal" data-type="{{ $file_type[$i] }}"
                                                        data-id="{{ $application->id }}">
                                                        <i class="fa fa-upload"></i>
                                                    </a>
                                                @endisset
                                            </td>
                                        @endif
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="alert alert-warning text-center bg-dark"
                                                style="color:#fff">
                                                No Records Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $applications->links() }} --}}
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
                                <label for="" style="font-weight: 600" id="title">UPLOAD</label>

                                <form action="{{ route('application.file.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-sm-6 mb-3">
                                        <select name="file_type" class="form-control" id="">
                                            <option value="Medical">Medical</option>
                                            <option value="Agreement">Agreement</option>
                                            <option value="Flight Ticket">Flight Ticket</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <input type="text" id="flight_ticket" name="flight_ticket" class="form-control mt-3">
                                        &nbsp; &nbsp; <input type="file" name="files[]" required multiple>
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
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

                    <script>
                        $('#flight_ticket').hide();

                        $('#exampleModal_5').on('show.bs.modal', function(event) {
                            var button = $(event.relatedTarget)
                            var id = button.data('id')
                            var type = button.data('type')
                            var title = button.data('title')
                            var modal = $(this)
                            modal.find('.modal-body #id').val(id);
                            modal.find('.modal-body #type').val(type);
                            document.getElementById('title').innerHTML = title;
                            $('select[name="file_type"]').on('change', function() {
                                if ($(this).val() == 'Flight Ticket') {
                                    $('#flight_ticket').show();
                                } else {
                                    $('#flight_ticket').hide();
                                    $('#flight_ticket').removeAttribute('name');
                                }

                            });

                        })
                    </script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        $(document).ready(function() {
                            $('select[name="filter"]').on('change', function() {
                                // alert('testing');
                                var status = $(this).val();
                                if (status) {
                                    $.ajax({
                                        url: "{{ URL::to('agent-application/filter') }}/" + status,
                                        type: "GET",
                                        // dataType: "json",
                                        success: function(data) {
                                            $('#applications_table').html(data);
                                        },error: function(data){
                                            console.log(data);
                                        }
                                    });

                                } else {
                                    console.log('AJAX load did not work');
                                }
                            });
                        });
                    </script>
                @endpush
            </div>
        </div>
    @endsection

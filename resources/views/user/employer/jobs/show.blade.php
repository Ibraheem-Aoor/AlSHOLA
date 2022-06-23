@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
@push('css')
    <style>
        table {
            font-size: 0.8rem;
        }

        .titles tr:nth-child(even) {
            background-color: #00B074;
            color: #ffff;
        }

        .titles th {
            background-color: #d8e8a7;
        }

        .basicInfo tr td:nth-child(even) {
            background-color: #00B074;
            color: #ffff;

        }
    </style>
@endpush
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <span class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Demand Status:
                    {{ $job->status }}</span>&nbsp;&nbsp;&nbsp;
                <span class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Demand Date:
                    {{ $job->created_at }}</span>
            </h1>

            <div class="row g-4">
                <div class="col-sm-12 text-center">

                    <div class="rounded h-100 p-4">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row rounded">
                                <table class="table table-striped titles">
                                    <tr>
                                        <th>Categorey</th>
                                        <th>Title</th>
                                        <th>Salary</th>
                                        <th>Quantity</th>
                                        <th>Nationality</th>
                                    </tr>
                                    @forelse ($job->subJobs as $subjob)
                                        <tr>
                                            <td>{{ $subjob->title->sector->name }}</td>
                                            <td>{{ $subjob->title->name }}</td>
                                            <td>{{ $subjob->salary }}</td>
                                            <td>{{ $subjob->quantity }}</td>
                                            <td>{{ $subjob->nationality->name }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </table>
                            </div>
                            <div class="row rounded">

                                <table class="table table-stripped basicInfo" style="font-size: 9px;">

                                    <tr>
                                        <td>Working Days:</td>
                                        <td>{{ $job->working_days }}</td>
                                    </tr>

                                    <tr>
                                        <td>Off Day:</td>
                                        <td>{{ $job->off_day }}</td>
                                    </tr>

                                    <tr>
                                        <td>Working Hours:</td>
                                        <td>{{ $job->working_hours }}</td>
                                    </tr>

                                    <tr>
                                        <td>Overtime: </td>
                                        <td>As Per Labour Law</td>
                                    </tr>

                                    <tr>
                                        <td>Indemnity: </td>
                                        <td>As Per Labour Law</td>
                                    </tr>

                                    <tr>
                                        <td>Food Allowance: </td>
                                        <td>{{ $job->food }} @if ($job->food_amount)
                                                {{ ' | ' . $job->food_amount }}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Contract Period: </td>
                                        <td>{{ $job->contract_period }}</td>
                                    </tr>

                                    <tr>
                                        <td>Joining Ticket: </td>
                                        <td>{{ $job->joining_ticket }}</td>
                                    </tr>

                                    <tr>
                                        <td>Return Ticket: </td>
                                        <td>{{ $job->return_ticket }}</td>
                                    </tr>

                                    <tr>
                                        <td>Annual Leave: </td>
                                        <td>{{ $job->annual_leave }}</td>
                                    </tr>


                                    <tr>
                                        <td>Medical Insurance: </td>
                                        <td>{{ $job->medical }}</td>
                                    </tr>

                                    <tr>
                                        <td>Transport</td>
                                        <td>{{ $job->transport }}</td>
                                    </tr>


                                    <tr>
                                        <td>Accommodation: </td>
                                        <td>{{ $job->accommodation }} @if ($job->accommodation_amount)
                                                {{ ' | ' . $job->accommodation_amount }}
                                            @endif
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            Country Entry requirements if any:
                                        </td>

                                        <td>
                                            Employer is liable for any additional fees, imposed by official authorities
                                            inside employer country
                                        </td>

                                    </tr>

                                </table>

                            </div>


                            @isset($job->description)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Desacription</label>
                                        <textarea class="form-control" readonly cols="30" style="height: 150px">{{ $job->description }}</textarea>
                                    </div>
                                </div>
                            @endisset

                            @isset($job->attachments)
                                <div class="row rounded mt-5">
                                    <table class="basicInfo table table-striped">
                                        @forelse($job->attachments as $attachment)
                                            <tr>
                                                <td>
                                                    {{ $attachment->name }}
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('job.attachment.download', ['jobId' => $job->id, 'fileName' => $attachment->name]) }}">
                                                        <i
                                                            class="fa fa-download"></i>&nbsp;&nbsp;{{ $attachment->created_at }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </table>
                                </div>
                            @endisset
                        </div>
                    </div>




                    <!-- Modal -->
                    <div class="modal fade" id="descmodal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Job Descreption</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea name="" id="desc" readonly name="desc" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End modal --}}

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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        $('#descmodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var desc = button.data('desc')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #desc').val(desc);
        })
    </script>
@endpush

@endsection

@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">DSR</th>
                                            <th scope="col">Categeory</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Total QTY</th>
                                            <th scope="col">contract_period</th>
                                            <th scope="col">working_hours</th>
                                            <th scope="col">working_days</th>
                                            @isset($job->currency)
                                                <th scope="col">Currency</th>
                                            @endisset
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $job->post_number }}</td>
                                            <td>{{ $job->subJobs->first()->title->sector->name }}</td>
                                            <td>{{ $job->subJobs->first()->title->name }}</td>
                                            <td>{{ $job->qty() }}</td>
                                            <td>{{ $job->contract_period }}</td>
                                            <td>{{ $job->working_hours }}</td>
                                            <td>{{ $job->working_days }}</td>
                                            @isset($job->currency)
                                                <td>{{ $job->currency }}</td>
                                            @endisset
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col">off_day</th>
                                            <th scope="col">accommodation</th>
                                            @isset($job->accommodation_amount)
                                                <th scope="col">accommodation_amount</th>
                                            @endisset
                                            <th scope="col">Food</th>
                                            @isset($job->food_amount)
                                                <th scope="col">Food Amount</th>
                                            @endisset
                                            <th scope="col">working_hours</th>
                                            <th scope="col">working_days</th>
                                            <th scope="col">transport</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $job->off_day }}</td>
                                            <td>{{ $job->accommodation }}</td>
                                            @isset($job->accommodation_amount)
                                                <td>{{ $job->accommodation_amount }}</td>
                                            @endisset
                                            <td>{{ $job->food }}</td>
                                            @isset($job->food_amount)
                                                <td>{{ $job->food_amount }}</td>
                                            @endisset
                                            <td>{{ $job->working_hours }}</td>
                                            <td>{{ $job->working_days }}</td>
                                            <td>{{ $job->transport }}</td>
                                        </tr>
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th scope="col">annual_leave</th>
                                            <th scope="col">medical</th>
                                            <th scope="col">joining_ticket</th>
                                            <th scope="col">return_ticket</th>
                                            <th scope="col">indemnity_leave_and_overtime_salary</th>
                                            @isset($job->age)
                                                <th scope="col">age</th>
                                            @endisset
                                            @isset($job->sex)
                                                <th scope="col">sex</th>
                                            @endisset
                                            <th scope="col">insurance</th>
                                            <th scope="col">gender_prefrences</th>
                                            <th scope="col">age_limit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $job->annual_leave }}</td>
                                            <td>{{ $job->medical }}</td>
                                            <td>{{ $job->joining_ticket }}</td>
                                            <td>{{ $job->return_ticket }}</td>
                                            <td>{{ $job->indemnity_leave_and_overtime_salary }}</td>
                                            @isset($job->age)
                                                <td>{{ $job->age }}</td>
                                            @endisset
                                            @isset($job->sex)
                                                <td>{{ $job->sex }}</td>
                                            @endisset
                                            <td>{{ $job->insurance }}</td>
                                            <td>{{ $job->gender_prefrences }}</td>
                                            <td>{{ $job->age_limit }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <label for="">Other Terms</label>
                                        <textarea class="form-control" readonly cols="30" style="height: 150px">{{ $job->other_terms }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- SubJobs table --}}
                            <div class="row rounded">
                                <table class="table table-striped">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col">nationality</th>
                                                <th scope="col">Descreption</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse($job->subJobs as $subJob)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $subJob->title->name }}</td>
                                                    <td>{{ $subJob->quantity }}</td>
                                                    <td>{{ $subJob->salary }}</td>
                                                    <td>{{ $subJob->nationality->name }}</td>
                                                    <td>{{ Str::limit($subJob->description, 35, '...') }}</td>
                                                    <td>
                                                        <a data-toggle="modal" data-desc="{{$subJob->description}}"   href="#descmodal">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="descmodal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Job Descreption</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
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

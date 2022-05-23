@extends('layouts.user.employer.master')
@section('title', 'ALSHOLA | JOB -'.$job->post_number)

@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Edit Job Post</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <form action="{{ route('job.update', $job->id) }}" method="POST" enctype="multipart/form-data"
                        name="jobForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="rounded h-100 p-4">
                            <div class="container-fluid pt-4 px-4">
                                <div class="row rounded">

                                    <div class="form-floating mb-3 col-sm-4">
                                        <select name="sector" class="form-control">
                                            @if ($job->title->sector)
                                                <option value="{{ $job->title->sector->id }}" selected>
                                                    {{ $job->title->sector->name }}</option>
                                            @endif
                                            <option value="">--- select one ---</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}"
                                                    @if (old('sector') == $sector->id) {{ 'selected' }} @endif>
                                                    {{ $sector->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingInput">&nbsp;&nbsp; Job Sector</label>
                                        @error('sector')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-4">
                                        <select name="title" class="form-control">
                                            @if ($job->title)
                                                <option value="{{ $job->title->id }}" selected>
                                                    {{ $job->title->name }}
                                                </option>
                                            @endif
                                            @if ($id = old('title'))
                                                {{ $title = \App\Models\Title::where('id', $id)->first() }}
                                                <option value="{{ old('title') }}">{{ $title->name }}</option>
                                            @endif
                                            <option value="title">--- select one ---</option>
                                        </select>
                                        <label for="floatingInput">&nbsp;&nbsp; Job Tilte</label>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <select name="nationality" class="form-control">
                                            @if ($job->nationality)
                                                <option value="{{ $job->nationality->id }}" selected>
                                                    {{ $job->nationality->name }}</option>
                                            @endif
                                            <option value="">--- select one ---</option>
                                            @foreach ($nationalities as $nationalitiesChunk)
                                                @foreach ($nationalitiesChunk as $nationality)
                                                    <option value="{{ $nationality->id }}"
                                                        @if (old('nationality') == $nationality->id) {{ 'selected' }} @endif>
                                                        {{ $nationality->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <label for="floatingInput">&nbsp;&nbsp; Nationality</label>
                                        @error('nationality')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="salary"
                                            value="{{ $job->salary }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                        @error('salary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="quantity"
                                            value="{{ $job->quantity }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Quantity</label>
                                        @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="contract_period"
                                            value="{{ $job->contract_period }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Contact Period</label>
                                        @error('contract_period')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="working_hours"
                                            value="{{ $job->working_hours }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; working Hours</label>
                                        @error('working_hours')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="working_days"
                                            value="{{ $job->working_days }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; working Days</label>
                                        @error('working_days')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="accommodation"
                                            value="{{ $job->accommodation }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Accommodation</label>
                                        @error('accommodation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="transport"
                                            value="{{ $job->transport }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Transport</label>
                                        @error('transport')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="medical"
                                            value="{{ $job->medical }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Medical</label>
                                        @error('medical')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="insurance"
                                            value="{{ $job->insurance }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Insurance</label>
                                        @error('insurance')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="food"
                                            value="{{ $job->food }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Food</label>
                                        @error('food')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="annual_leave"
                                            value="{{ $job->annual_leave }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Annual Leave</label>
                                        @error('annual_leave')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>





                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="air_ticket"
                                            value="{{ $job->air_ticket }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Air Ticket</label>
                                        @error('air_ticket')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control" name="off_day"
                                            value="{{ $job->off_day }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Off Day</label>
                                        @error('off_day')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control"
                                            name="indemnity_leave_and_overtime_salary"
                                            value="{{ $job->indemnity_leave_and_overtime_salary }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Indemnity Leave And Overtime
                                            Salary</label>
                                        @error('indemnity_leave_and_overtime_salary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-4">
                                        <input type="text" class="form-control"
                                            name="covid_test"
                                            value="{{ $job->covid_test }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Covid Test
                                            Salary</label>
                                        @error('covid_test')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea  class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 150px;" name="other_terms">{{ $job->other_terms }}</textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Other Terms</label>
                                    @error('other_terms')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea  class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 150px;" name="description">{{$job->description }}</textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                    <div class="form-floating col-sm-12 mb-3 mr-auto">
                                        <button type="submit" class="btn btn-primary col-sm-4 mr-auto">SAVE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
    $(document).ready(function() {
        $('#fileTypeDiv').hide();
        $('input[name="attachments[]"]').on('change', function() {
            var file = document.forms['jobForm']['attachments[]'].files[0];
            if (file != null)
                $('#fileTypeDiv').show();
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="sector"]').on('change', function() {
            var SectorId = $(this).val();
            if (SectorId) {
                $.ajax({
                    url: "{{ URL::to('employer/sector') }}/" + SectorId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="title"]').empty();
                        $.each(data, function(key, value) { //for each loop
                            $('select[name="title"]').append('<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });
</script>
@endpush

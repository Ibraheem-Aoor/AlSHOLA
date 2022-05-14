@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
@section('content')
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
@section('title', 'Dashboard | Create Job Post')
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Post A New Job For Your Business</h1>
        <div class="row g-4">
            <div class="col-sm-12 text-center">
                @if (Session::has('error'))
                    <div class="alert alet-danger">{{ $request->session()->get('error') }}</div>
                @endif
                <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data" name="jobForm">
                    @csrf
                    <div class="rounded h-100 p-4">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row rounded">
                                <div class="form-floating mb-3 col-sm-4">
                                    <select name="sector" class="form-control">
                                        <option value="">--- select one ---</option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}"
                                                @if (old('sector') == $sector->id) {{ 'selected' }} @endif>
                                                {{ $sector->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingInput">&nbsp;&nbsp; Job Category</label>
                                    @error('sector')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-4">
                                    <select name="title" class="form-control">
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
                                    <input required type="text" class="form-control" id="floatingPassword"
                                        name="quantity" value="{{ old('quantity') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Quantity</label>
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="salary"
                                        value="{{ old('salary') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="contract_period"
                                        value="{{ old('contract_period') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; CONTRACT PERIOD</label>
                                    @error('contract_period')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="working_hours"
                                        value="{{ old('working_hours') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; WORKING HOURS PER DAY</label>
                                    @error('working_hours')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="working_days"
                                        value="{{ old('working_days') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; WORKING DAYS</label>
                                    @error('working_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="off_day"
                                        value="{{ old('off_day') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; OFF DAY</label>
                                    @error('off_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="accommodation"
                                        value="{{ old('accommodation') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; ACCOMMODATION</label>
                                    @error('accommodation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="transport"
                                        value="{{ old('transport') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; TRANSPORT</label>
                                    @error('transport')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="medical"
                                        value="{{ old('medical') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; MEDICAL</label>
                                    @error('medical')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="insurance"
                                        value="{{ old('insurance') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; INSURANCE</label>
                                    @error('insurance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="food"
                                        value="{{ old('food') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; FOOD</label>
                                    @error('food')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="annual_leave"
                                        value="{{ old('annual_leave') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; ANNUAL LEAVE</label>
                                    @error('annual_leave')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="air_ticket"
                                        value="{{ old('air_ticket') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; AIR TICKET</label>
                                    @error('air_ticket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control"
                                        name="indemnity_leave_and_overtime_salary"
                                        value="{{ old('indemnity_leave_and_overtime_salary') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; indemnity and over time salary</label>
                                    @error('indemnity_leave_and_overtime_salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="covid_test"
                                        value="{{ old('covid_test') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; COVID-19 TEST</label>
                                    @error('covid_test')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea required class="form-control" name="other_terms"
                                        style="height: 150px;">{{ old('other_terms') }}</textarea>
                                    <label for="floatingPassword">&nbsp;&nbsp; Other Terms</label>
                                    @error('other_terms')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="form-floating mb-3 col-sm-4" id="fileTypeDiv">
                                    <select name="file_type" class="form-control">
                                        @foreach ($fileTypes as $type)
                                            <option value="{{ $type->name }}"
                                                @if (old('file_type') == $type->id) {{ 'selected' }} @endif>
                                                {{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; File Type</label>
                                    @error('file_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}


                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea required class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 150px;" name="description">{{ old('description') }}</textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="form-floating mb-3 col-sm-4">
                                    <input type="file" name="responsibilites_file" class="form-control">
                                    <label for="floatingPassword">Responsibilities File</label>
                                    <p class="text-info">attach file instead of write the Responsebilites</p> <br>
                                    @error('responsibilites_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                                <div class="form-floating col-sm-12 mb-3">
                                    <button type="submit" class="btn btn-primary col-sm-12">POST NEW JOB</button>
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
@endsection

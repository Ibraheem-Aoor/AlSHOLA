@extends('layouts.user.employer.master')
@section('title', 'ALSHOLA | ADD NEW JOB')

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
                                    <select class="form-control" name="working_days">
                                        <option value="">-- select one --</option>
                                        <option value="5" @if (old('working_days') == 5) {{ 'selected' }} @endif>
                                            5</option>
                                        <option value="6" @if (old('working_days') == 6) {{ 'selected' }} @endif>
                                            6</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; WORKING DAYS</label>
                                    @error('working_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-4">
                                    <input required type="text" class="form-control" name="off_day"
                                        value="{{ old('off_day') }}" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; OFF DAY</label>
                                    @error('off_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <select class="form-control" name="accommodation">
                                        <option value="">-- select one --</option>
                                        <option value="Provided By Employer">Provided By Employer</option>
                                        <option value="Allowance">Allowance</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; ACCOMMODATION</label>
                                    @error('accommodation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-4" id="acc-div" style="display: none">
                                    <input  placeholder="accommodation amount" type="text"
                                        class="form-control" name="accommodation_amount"
                                        value="{{ old('accommodation_amount') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Accommodation Amount</label>
                                    @error('accommodation_amount')
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
                                    <select required type="text" class="form-control" name="food"
                                        value="{{ old('food') }}">
                                        <option value="">-- select one --</option>
                                        <option value="Provided By Employer">Provided By Employer</option>
                                        <option value="Not Provided">Not Provided</option>
                                        <option value="Duty Meals">Duty Meals</option>
                                        <option value="Allowance">Allowance</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; FOOD</label>
                                    @error('food')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-4" id="acc-food-div" style="display: none">
                                    <input  placeholder="food amount" type="text" class="form-control"
                                        name="food_amount" value="{{ old('food_amount') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Food Amount</label>
                                    @error('food_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-4">
                                    <select required type="text" class="form-control" name="joining_ticket"
                                        value="{{ old('joining_ticket') }}">
                                        <option value="Provided by Employer">Provided by Employer</option>
                                        <option value="Not Provided">Not Provided</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Joining Ticket</label>
                                    @error('joining_ticket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <select required type="text" class="form-control" name="return_ticket"
                                        value="{{ old('return_ticket') }}">
                                        <option value="Every Completion One Year">Every Completion One Year</option>
                                        <option value="Every Completion Two Year">Every Completion Two Year</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Joining Ticket</label>
                                    @error('return_ticket')
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




                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea required class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 150px;" name="description">{{ old('description') }}</textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-12">
                                    <input type="file" class="form-control" multiple name="attachments">
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description Attachment</label>
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
            });
            $('select[name="working_days"]').on('change', function() {
                var workingDays = $(this).val();
                if (workingDays == 5)
                    $('input[name="off_day"]').val(2);
                else if (workingDays == 6)
                    $('input[name="off_day"]').val(1);
            });

            $('select[name="accommodation"]').on('change', function() {
                var acc = $(this).val();
                if (acc == 'Allowance')
                    $('#acc-div').show();
                else {
                    $('#acc-div').hide();
                    $('input[name="accommodation_amount"]').removeAttribute('name');
                }
            });
            $('select[name="food"]').on('change', function() {
                var food = $(this).val();
                if (food == 'Allowance')
                    $('#acc-food-div').show();
                else {
                    $('#acc--food-div').hide();
                    $('input[name="food_amount"]').removeAttribute('name');
                }

            });
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

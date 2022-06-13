@extends('layouts.user.employer.master')
@section('title', 'ALSHOLA | ADD NEW JOB')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
@section('title', 'Dashboard | Create Job Post')
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Set Up The Basic Demand Information</h1>
        <div class="row g-4">
            <div class="col-sm-12 text-center">
                @if (Session::has('error'))
                    <div class="alert alet-danger">{{ $request->session()->get('error') }}</div>
                @endif
                <form action="{{ route('jobs.edit.step-1', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="rounded h-100 p-4">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row rounded">
                                <div class="form-floating mb-3 col-sm-3">
                                    <select name="sector" class="form-control" required>
                                        <option value="">--- select one ---</option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}"
                                                @if ($job->subJobs->first()->title->sector->id == $sector->id) {{ 'selected' }} @endif>
                                                {{ $sector->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingInput">&nbsp;&nbsp; Job Category</label>
                                    @error('sector')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select name="currency" class="form-control" required>
                                        <option value="">-- select one --</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->key }}"
                                                @if ($job->currency == $currency->key) selected @endif>
                                                {{ $currency->key . ' (' . $currency->value . ')' }}</option>
                                        @endforeach
                                        @error('currency')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Currency</label>
                                </div>




                                <div class="form-floating mb-3 col-sm-3">
                                    <select class="form-control" name="working_days" required>
                                        <option value="">-- select one --</option>
                                        <option value="5" @if ($job->working_days == 5) {{ 'selected' }} @endif>
                                            5</option>
                                        <option value="6" @if ($job->working_days == 6) {{ 'selected' }} @endif>
                                            6</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; WORKING DAYS</label>
                                    @error('working_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-3">
                                    <input required type="text" class="form-control" name="off_day"
                                        value="{{ $job->off_day }}" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; OFF DAY</label>
                                    @error('off_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select class="form-control" name="accommodation" required>
                                        <option value="">-- select one --</option>
                                        <option value="Provided By Employer"
                                            @if ($job->accommodation == 'Provided By Employer') selected @endif>Provided By Employer
                                        </option>
                                        <option value="Allowance" @if ($job->accommodation == 'Allowance') selected @endif>
                                            Allowance</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; ACCOMMODATION</label>
                                    @error('accommodation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-3" id="acc-div" style="display: none">
                                    <input placeholder="accommodation amount" type="text" class="form-control"
                                        name="accommodation_amount" value="{{ $job->accommodation_amount }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Accommodation Amount</label>
                                    @error('accommodation_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>





                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="food" required
                                        value="{{ old('food') }}">
                                        <option value="">-- select one --</option>
                                        <option value="Provided By Employer"
                                            @if ($job->food == 'Provided By Employer') selected @endif>Provided By Employer
                                        </option>
                                        <option value="Not Provided" @if ($job->food == 'Not Provided') selected @endif>
                                            Not Provided</option>
                                        <option value="Duty Meals" @if ($job->food == 'Duty Meals') selected @endif>
                                            Duty Meals</option>
                                        <option value="Allowance" @if ($job->food == 'Allowance') selected @endif>
                                            Allowance</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; FOOD</label>
                                    @error('food')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                <div class="form-floating mb-3 col-sm-3" id="acc-food-div" style="display: none">
                                    <input placeholder="food amount" type="text" class="form-control"
                                        name="food_amount" value="{{ $job->food_amount }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Food Amount</label>
                                    @error('food_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="joining_ticket"
                                        value="{{ $job->joining_ticket }}">
                                        <option value="Provided by Employer"
                                            @if ($job->joining_ticket == 'Provided by Employer') selected @endif>Provided by Employer
                                        </option>
                                        <option value="Not Provided"
                                            @if ($job->joining_ticket == 'Not Provided') selected @endif>Not Provided</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Joining Ticket</label>
                                    @error('joining_ticket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="return_ticket"
                                        value="{{ $job->return_ticket }}">
                                        <option value="Every Completion One Year"
                                            @if ($job->return_ticket == 'Every Completion One Year') selected @endif>Every Completion One
                                            Year</option>
                                        <option value="Every Completion Two Year"
                                            @if ($job->return_ticket == 'Every Completion Two Year') selected @endif>Every Completion Two
                                            Year</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Return Ticket</label>
                                    @error('return_ticket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="gender_prefrences"
                                        value="{{ old('gender_prefrences') }}">
                                        <option value="">-- select one</option>
                                        <option value="male" @if ($job->gender_prefrences == 'male') selected @endif>Male
                                        </option>
                                        <option value="female" @if ($job->gender_prefrences == 'female') selected @endif>
                                            Female</option>
                                        <option value="no prefrences"
                                            @if ($job->gender_prefrences == 'no prefrences') selected @endif>No Prefrences</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Gender Prefrences</label>
                                    @error('gender_prefrences')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="age_limit"
                                        value="{{ $job->age_limit }}">
                                        <option value="">-- select one</option>
                                        <option value="Below 40" @if ($job->age_limit == 'Below 40') selected @endif>
                                            Below 40 </option>
                                        <option value="Below 50" @if ($job->age_limit == 'Below 50') selected @endif>
                                            Below 50</option>
                                        <option value="Below 60" @if ($job->age_limit == 'Below 60') selected @endif>
                                            Below 60</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Age Limit</label>
                                    @error('age_limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Start Deffaulkt Value Inputs --}}
                                <div class="form-floating mb-3 col-sm-3">
                                    <input type="text" class="form-control" value="contract_period" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; Contract Period</label>
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <input type="text" class="form-control" value="8 Hours" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; Working Hours</label>
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <input type="text" class="form-control" value="8 Hours" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; Working Hours</label>
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <input type="text" class="form-control" value="Provided By Employer" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; Transport</label>
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <input type="text" class="form-control" value="As per Labour Law" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; Medical</label>
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <input type="text" class="form-control" value="As per Labour Law" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; Annual Leave</label>
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <input type="text" class="form-control" value="As per Labour Law" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; Indemnity Leave And Overtime
                                        Salary</label>
                                </div>

                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea type="text" class="form-control" style="height: 150px;" readonly>Employers are liable for measures or preventive measures imposed by official authorities inside their country</textarea>
                                    <label for="floatingPassword">&nbsp;&nbsp; Indemnity Leave And Overtime
                                        Salary</label>
                                </div>

                                {{-- End Deffaulkt Value Inputs --}}




                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea required class="form-control" name="other_terms" style="height: 150px;">{{ $job->other_terms }}</textarea>
                                    <label for="floatingPassword">&nbsp;&nbsp; Other Terms</label>
                                    @error('other_terms')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-12">
                                    <input type="file" class="form-control" name="attachments[]" multiple
                                        style="font-size:14px;height:60px !important;">
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description Attachment</label>
                                    @error('attachments')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-primary col-sm-4">
                                    NEXT <i class="fa fa-arrow-right"></i>
                                </button>


                            </div>
                        </div>
                    </div>
                </form>

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

    <script>
        $(document).ready(function() {
            $('#fileTypeDiv').hide();
            $('#add-new-title-dev').hide();
            $('#next').hide();
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
                    $('#acc-food-div').hide();
                    $('input[name="food_amount"]').removeAttribute('name');
                }

            });
        });
    </script>
@endpush
@endsection

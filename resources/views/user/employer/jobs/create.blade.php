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
                <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data" id="my-form"
                    name="jobForm">
                    @csrf
                    <div class="rounded h-100 p-4">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row rounded">
                                <div class="form-floating mb-3 col-sm-3">
                                    <select name="sector" class="form-control" required>
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
                                <div class="form-floating mb-3 col-sm-3">
                                    <select name="title" class="form-control" required>
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

                                <div class="form-floating mb-3 col-sm-3">
                                    <select name="nationality" class="form-control" required>
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


                                <div class="form-floating mb-3 col-sm-3">
                                    <input required type="text" class="form-control" id="floatingPassword"
                                        name="quantity" value="{{ old('quantity') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Quantity</label>
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-3">
                                    <input required type="text" class="form-control" name="salary"
                                        value="{{ old('salary') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select name="currency" class="form-control" required>
                                        <option value="">-- select one --</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->key }}"
                                                @if (old('currency') == $currency->key) selected @endif>
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


                                <div class="form-floating mb-3 col-sm-3">
                                    <input required type="text" class="form-control" name="off_day"
                                        value="{{ old('off_day') }}" readonly>
                                    <label for="floatingPassword">&nbsp;&nbsp; OFF DAY</label>
                                    @error('off_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select class="form-control" name="accommodation" required>
                                        <option value="">-- select one --</option>
                                        <option value="Provided By Employer"
                                            @if (old('accommodation') == 'Provided By Employer') selected @endif>Provided By Employer
                                        </option>
                                        <option value="Allowance" @if (old('accommodation') == 'Allowance') selected @endif>
                                            Allowance</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; ACCOMMODATION</label>
                                    @error('accommodation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-3" id="acc-div" style="display: none">
                                    <input placeholder="accommodation amount" type="text" class="form-control"
                                        name="accommodation_amount" value="{{ old('accommodation_amount') }}">
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
                                            @if (old('food') == 'Provided By Employer') selected @endif>Provided By Employer
                                        </option>
                                        <option value="Not Provided" @if (old('food') == 'Not Provided') selected @endif>
                                            Not Provided</option>
                                        <option value="Duty Meals" @if (old('food') == 'Duty Meals') selected @endif>
                                            Duty Meals</option>
                                        <option value="Allowance" @if (old('food') == 'Allowance') selected @endif>
                                            Allowance</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; FOOD</label>
                                    @error('food')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                <div class="form-floating mb-3 col-sm-3" id="acc-food-div" style="display: none">
                                    <input placeholder="food amount" type="text" class="form-control"
                                        name="food_amount" value="{{ old('food_amount') }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Food Amount</label>
                                    @error('food_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="joining_ticket"
                                        value="{{ old('joining_ticket') }}">
                                        <option value="Provided by Employer"
                                            @if (old('joining_ticket') == 'Provided by Employer') selected @endif>Provided by Employer
                                        </option>
                                        <option value="Not Provided"
                                            @if (old('joining_ticket') == 'Not Provided') selected @endif>Not Provided</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Joining Ticket</label>
                                    @error('joining_ticket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="return_ticket"
                                        value="{{ old('return_ticket') }}">
                                        <option value="Every Completion One Year"
                                            @if (old('return_ticket') == 'Every Completion One Year') selected @endif>Every Completion One
                                            Year</option>
                                        <option value="Every Completion Two Year"
                                            @if (old('return_ticket') == 'Every Completion Two Year') selected @endif>Every Completion Two
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
                                        <option value="male" @if (old('gender_prefrences') == 'male') selected @endif>Male
                                        </option>
                                        <option value="female" @if (old('gender_prefrences') == 'female') selected @endif>
                                            Female</option>
                                        <option value="no prefrences"
                                            @if (old('gender_prefrences') == 'no prefrences') selected @endif>No Prefrences</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Gender Prefrences</label>
                                    @error('gender_prefrences')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-3">
                                    <select required type="text" class="form-control" name="age_limit"
                                        value="{{ old('age_limit') }}">
                                        <option value="">-- select one</option>
                                        <option value="Below 40" @if (old('age_limit') == 'Below 40') selected @endif>
                                            Below 40 </option>
                                        <option value="Below 50" @if (old('age_limit') == 'Below 50') selected @endif>
                                            Below 50</option>
                                        <option value="Below 60" @if (old('age_limit') == 'Below 60') selected @endif>
                                            Below 60</option>
                                    </select>
                                    <label for="floatingPassword">&nbsp;&nbsp; Age Limit</label>
                                    @error('age_limit')
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
                                    <input type="file" class="form-control" name="attachments[]" multiple
                                        style="font-size:14px;height:60px !important;">
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description Attachment</label>
                                    @error('attachments')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="form-floating mb-3 col-sm-3">
                                    <input type="file" name="responsibilites_file" class="form-control">
                                    <label for="floatingPassword">Responsibilities File</label>
                                    <p class="text-info">attach file instead of write the Responsebilites</p> <br>
                                    @error('responsibilites_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                <div class="card mb-5" id="add-new-title-dev">
                                    <div class="card-body">
                                        <table class="table table-responsive" id="newTtile">
                                            <tr>
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>salary</th>
                                                <th>Nationality</th>
                                                <th>Descreption</th>
                                            </tr>
                                            @if (old('subJob'))
                                                @forelse(old('subJob') as $job)
                                                    <tr>
                                                        <td>{{ $job['title'] }}</td>
                                                        <td>{{ $job['quantity'] }}</td>
                                                        <td>{{ $job['salary'] }}</td>
                                                        <td>{{ $job['nationality'] }}</td>
                                                        <td>{{ $job['description'] }}</td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            @endif
                                        </table>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary col-sm-4" data-toggle="modal"
                                    data-target="#exampleModalCenter" id="next">
                                    NEXT
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Agreement</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="checkbox" name="agree" required>
                                                I Agree To All Terms And Conditions.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info"
                                                    data-dismiss="modal">BACK</button>
                                                <button type="submit" class="btn btn-primary">AGREE & SUBMIT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3"></div>
                                <button type="button" id="add-new-title" class="btn btn-info col-sm-3">Add New</button>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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



    {{-- Add new Title Script --}}
    <script>
        $(document).ready(function() {
            var i = 0;
            $('#add-new-title').on('click', function() {
                $('#add-new-title-dev').show();
                $('#next').show();

                var title, qty, salary, description, nationality;
                var elements = document.getElementById("my-form").elements;
                elements.forEach(element => {
                    if (element.name == 'title') {
                        title = element.value;
                    } else if (element.name == 'quantity') {
                        qty = element.value;
                    } else if (element.name == 'salary') {
                        salary = element.value;

                    } else if (element.name == 'description') {
                        description = element.value;
                    } else if (element.name == 'nationality') {
                        nationality = element.value;
                    }
                });
                ++i;
                $('#newTtile').append(
                    '<tr><td><input type="text" name="subJob[' + i +
                    '][title]" readonly class="form-control" value = "' +
                    title +
                    ' " /></td><td><input type="text" name="subJob[' + i +
                    '][quantity]" placeholder="Enter Year" readonly class="form-control" value = "' +
                    qty +
                    ' " /></td><td><input type="text" name="subJob[' + i +
                    '][salary]" placeholder="Enter educational body" readonly class="form-control" value = "' +
                    salary +
                    ' " /></td><td><input type="text" name="subJob[' + i +
                    '][nationality]" readonly class="form-control" value = "' +
                    nationality +
                    ' " /></td><td><input type="text" name="subJob[' + i +
                    '][description]" readonly class="form-control" value = "' +
                    description +
                    ' " /></td><td><button type="button" class="btn btn-outline-danger remove-edu-input-field">Delete</button></td><td><a  data-desc="' +
                    description +
                    '"   data-toggle="modal" href="#descmodal" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a></td></tr>'
                );
                $(document).on('click', '.remove-edu-input-field', function() {
                    $(this).parents('tr').remove();
                });
            });

            clearInputs(elements);

        });

        function clearInputs(elements) {
            elements.forEach(element => {
                element.addAttriubte('readonly');
            });
        }
    </script>
@endpush
@endsection

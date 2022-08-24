<div>
    @section('content')
        @push('css')
            <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
            <style>
                .form-control {
                    /* height: 20px !important; */
                    width: 90% !important;
                }
            </style>
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
                    width: 50% !important;
                }



                select,
                input {
                    font-size: 11px !important;
                }

                input .form-control {
                    height: calc(2.8rem + 2px) !important;
                }

                select {
                    padding-bottom: 4px !important;
                }

                .basicInfo input {
                    background: transparent;
                    /* height: 20px; */
                    width: 100% !important;
                    font-size: 10px !important;
                    padding: 2px !important;
                }

                .basicInfo input,
                select {
                    width: 100% !important;
                }
            </style>
        @endpush
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Post A New Job For Your Business</h1>
                <div class="row g-4">
                    <div class="col-sm-12 text-center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @forelse ($errors->all() as $error)
                                    <ul>
                                        <li class="text-truncate me-0 text-danger"> {{ $error }}</li>
                                    </ul>
                                @empty
                                @endforelse
                            </div>
                        @endif
                        <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data" id="my-form"
                            name="jobForm">
                            @csrf
                            <div class="rounded h-100 p-4">
                                <div class="container-fluid pt-4 px-4">

                                    <div class="row rounded">
                                        <div class="form-floating mb-3 col-sm-3">
                                            <label>Job Category</label>
                                            <select name="sector" class="form-control" required>
                                                <option>--- select one ---</option>
                                                @foreach ($sectors as $sector)
                                                    <option value="{{ $sector->name }}"
                                                        @if (old('sector') == $sector) selected @endif>
                                                        {{ $sector->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sector')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 col-sm-3">
                                            <label for="floatingInput">Job Tilte</label>
                                            <select name="title" class="form-control" required>
                                                <option value="title">--- select one ---</option>

                                            </select>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-floating mb-3 col-sm-3">
                                            <label for="floatingPassword">Quantity</label>
                                            <input required type="number" class="form-control" id="floatingPassword"
                                                name="quantity" value="{{ old('quantity') }}">
                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 col-sm-3">
                                            <label for="floatingPassword">Salary</label>
                                            <input required type="number" class="form-control" name="salary"
                                                value="{{ old('salary') }}">
                                            @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-floating mb-3 col-sm-3">
                                            <label for="floatingInput">Gender</label>
                                            <select name="gender" class="form-control" required>
                                                <option value="title">--- select one ---</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 col-sm-3">
                                            <label for="floatingInput">Age</label>
                                            <select name="age_limit" class="form-control" required>
                                                <option value="title">--- select one ---</option>
                                                <option value="Below 40">Below 40</option>
                                                <option value="Below 50">Below 50</option>
                                                <option value="Below 60">Below 60</option>
                                            </select>
                                            @error('age_limit')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-floating mb-3 col-sm-3">
                                            <label for="floatingInput">Nationality</label>

                                            <select name="nationality" class="form-control" required>
                                                <option value="">--- select one ---</option>
                                                @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->name }}"
                                                        @if (old('nationality') == $nationality->name) {{ 'selected' }} @endif>
                                                        {{ $nationality->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('nationality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>
                                        <button type="button" id="add-new-title"
                                            class="btn-sm btn btn-info col-sm-3 mt-4 form-control "><i
                                                class="fa fa-plus"></i> Add
                                            New</button>


                                        <div class="card mb-5" id="add-new-title-dev">
                                            <div class="card-body">
                                                <table class="table table-responsive" id="newTtile">
                                                    <tr>
                                                        <th>Job Category</th>
                                                        <th>Title</th>
                                                        <th>Quantity</th>
                                                        <th>salary</th>
                                                        <th>Gender</th>
                                                        <th>Age</th>
                                                        <th>Nationality</th>
                                                    </tr>
                                                    @if (old('subJob'))
                                                        {{-- <h3>SETED</h3> --}}
                                                    @endif
                                                </table>
                                            </div>
                                        </div>





                                        <div class="container mt-3">
                                            <div class="row mb-3">
                                                <table class="table table basicInfo">

                                                    <tr>
                                                        <td>Cuurency</td>
                                                        <td>
                                                            <select name="currency" class="form-control">
                                                                @foreach ($currencies as $currency)
                                                                    <option value="{{ $currency->key }}">
                                                                        {{ $currency->key }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Working Days:</td>
                                                        <td>
                                                            <select class="form-control" name="working_days" required>
                                                                <option value="">-- select one --</option>
                                                                <option value="5"
                                                                    @if (old('working_days') == 5) {{ 'selected' }} @endif>
                                                                    5</option>
                                                                <option value="6"
                                                                    @if (old('working_days') == 6) {{ 'selected' }} @endif>
                                                                    6</option>
                                                            </select>
                                                            @error('working_days')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Off Day:</td>
                                                        <td><input type="text" class="form-control" name="off_day"
                                                                readonly>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Working Hours:</td>
                                                        <td><input type="text" class="form-control" name="working_hours"
                                                                value="8 Hours" readonly></td>
                                                    </tr>


                                                    <tr>
                                                        <td>Food Allowance: </td>
                                                        <td>
                                                            <select required class="form-control" name="food" required
                                                                value="{{ old('food') }}">
                                                                <option value="">-- select one --</option>
                                                                <option value="Provided By Employer"
                                                                    @if (old('food') == 'Provided By Employer') selected @endif>
                                                                    Provided
                                                                    By Employer
                                                                </option>
                                                                <option value="Not Provided"
                                                                    @if (old('food') == 'Not Provided') selected @endif>
                                                                    Not Provided</option>
                                                                <option value="Duty Meals"
                                                                    @if (old('food') == 'Duty Meals') selected @endif>
                                                                    Duty Meals</option>
                                                                <option value="Allowance"
                                                                    @if (old('food') == 'Allowance') selected @endif>
                                                                    Allowance</option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                    <tr id="acc-food-div">
                                                        <td>Food Amount:</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="food_amount"
                                                                value="{{ old('food_amount') }}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Contract Period: </td>
                                                        <td><input type="text" class="form-control" value="2 Years"
                                                                readonly>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Joining Ticket: </td>
                                                        <td>
                                                            <select class="form-control" name="joining_ticket">
                                                                <option value="">-- choose one --</option>
                                                                <option value="Provided by Employer">Provided by Employer
                                                                </option>
                                                                <option value="Not Provided">Not Provided"</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Return Ticket: </td>
                                                        <td>
                                                            <select class="form-control" name="return_ticket">
                                                                <option value="">-- choose one --</option>
                                                                <option value="Every Completion One Year">Every Completion
                                                                    One
                                                                    Year</option>
                                                                <option value="Every Completion Two Year">Every Completion
                                                                    Two
                                                                    Year</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Indemnity: </td>
                                                        <td><input type="text" class="form-control"
                                                                value="As per Labour Law" readonly>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Overtime salary: </td>
                                                        <td><input type="text" class="form-control"
                                                                value="As per Labour Law" readonly>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Annual Leave: </td>
                                                        <td><input type="text" class="form-control"
                                                                value="As per Labour Law" readonly>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>Medical Insurance: </td>
                                                        <td><input type="text" class="form-control"
                                                                value="As per Labour Law" readonly>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Transport</td>
                                                        <td><input type="text" class="form-control"
                                                                value="Provided By Employer" readonly>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>Accommodation: </td>
                                                        <td>
                                                            <select required class="form-control" name="accommodation"
                                                                required value="{{ old('accommodation') }}">
                                                                <option value="">-- select one --</option>
                                                                <option value="Provided By Employer"
                                                                    @if (old('accommodation') == 'Provided By Employer') selected @endif>
                                                                    Provided
                                                                    By Employer
                                                                </option>
                                                                <option value="Not Provided"
                                                                    @if (old('accommodation') == 'Not Provided') selected @endif>
                                                                    Not Provided</option>
                                                                <option value="Allowance"
                                                                    @if (old('accommodation') == 'Allowance') selected @endif>
                                                                    Allowance</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr id="acc-div">
                                                        <td>Accommodation Amount: </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="accommodation_amount"
                                                                value="{{ old('accommodation_amount') }}" required>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>Client</td>
                                                        <td>
                                                            <select name="client_id" class="form-control">
                                                                @foreach ($clients as $client)
                                                                    <option value="{{ $client->id }}"
                                                                        @if (old('client_id') == $client->id) selected @endif>
                                                                        {{ $client->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Country Entry requirements if any:
                                                        </td>

                                                        <td>
                                                            Employer is liable for any additional fees, imposed by
                                                            official authorities
                                                            inside employer country
                                                        </td>

                                                    </tr>

                                                </table>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="form-floating mb-3 col-sm-12">
                                                <textarea required class="form-control" name="description" style="height: 150px;">{{ old('description') }}</textarea>
                                                <label for="floatingPassword">&nbsp;&nbsp;Description</label>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-3 col-sm-12">
                                                <input type="file" class="form-control" name="attachments[]" multiple
                                                    style="font-size:14px;height:60px !important;">
                                                <label for="floatingTextarea">&nbsp;&nbsp; Job Description
                                                    Attachment</label>
                                                @error('attachments')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary col-sm-12" data-toggle="modal"
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
                                                    <div class="modal-body" style="font-size:13px;">
                                                        <div class="container">
                                                            <div class="row">

                                                                <div class="col-sm-12 text-center">
                                                                    <p class="text-center">
                                                                        I hereby declare that the information provided is
                                                                        true
                                                                        and
                                                                        correct.
                                                                    </p> <br>

                                                                    <p class="text-center">
                                                                        My submission of this application is subject to the
                                                                        fees
                                                                        of the
                                                                        recruitment process, and therefore I confirm my
                                                                        commitment to
                                                                        it.
                                                                    </p> <br>

                                                                    <p class="text-center">
                                                                        This demand is exclusive to Alshoala, and if it is
                                                                        given
                                                                        another
                                                                        agency, the employer must notify Alshoala.
                                                                    </p> <br>

                                                                    <p class="text-center">
                                                                        I also understand that all terms and conditions of
                                                                        the
                                                                        Employment Services Agreement signed between
                                                                        Alshoala
                                                                        and the
                                                                        employer shall apply.
                                                                    </p> <br> <br> <br>
                                                                </div>

                                                                <br> <br> <br>
                                                                <div class="col-sm-12  mb-2" style="font-size:1rem"
                                                                    style="height: calc(3.5rem + 2px);">
                                                                    <input type="checkbox" name="agree" id="accept"
                                                                        required>
                                                                    I Agree To All Terms And Conditions.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info"
                                                            data-dismiss="modal">BACK</button>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="submitForm();">AGREE
                                                            &
                                                            SUBMIT</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-4"></div>


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
                                        <textarea name="" id="desc" readonly name="desc" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
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
                var SendInfo = {
                    SendInfo: document.getElementById("my-form").elements
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                });
                $('select[name="sector"]').on('change', function() {
                    var sectorName = $(this).val();
                    if (sectorName) {
                        $.ajax({
                            url: "{{ URL::to('broker/sector') }}/" + sectorName,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="title"]').empty();
                                $.each(data, function(key, value) { //for each loop
                                    $('select[name="title"]').append('<option value="' +
                                        value.name + '">' + value.name + '</option>');
                                });
                            }
                        });
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

                    var title, qty, salary, age, nationality, gender, sector;
                    var elements = document.getElementById("my-form").elements;
                    elements.forEach(element => {
                        if (element.name == 'title') {
                            title = element.value;
                        } else if (element.name == 'quantity') {
                            qty = element.value;
                        } else if (element.name == 'salary') {
                            salary = element.value;

                        } else if (element.name == 'age_limit') {
                            age = element.value;
                        } else if (element.name == 'nationality') {
                            nationality = element.value;
                        } else if (element.name == 'gender') {
                            gender = element.value;
                        } else if (element.name == 'sector') {
                            sector = element.value;
                        }
                    });
                    ++i;
                    $('#newTtile').append(
                        '<tr><td><input type="text" name="subJob[' + i +
                        '][sector]" readonly class="form-control" value = "' +
                        sector +
                        ' " /></td><td><input type="text" name="subJob[' + i +
                        '][title]" placeholder="Enter Year" readonly class="form-control" value = "' +
                        title +
                        ' " /></td><td><input type="text" name="subJob[' + i +
                        '][quantity]" placeholder="Enter educational body" readonly class="form-control" value = "' +
                        qty +
                        ' " /></td><td><input type="text" name="subJob[' + i +
                        '][salary]" readonly class="form-control" value = "' +
                        salary +
                        ' " /></td><td><input type="text" name="subJob[' + i +
                        '][gender]" readonly class="form-control" value = "' +
                        gender +
                        ' " /></td>' + '<td><input type="text" name="subJob[' + i +
                        '][age]" readonly class="form-control" value = "' +
                        age +
                        ' " /></td>' +
                        ' " /></td>' + '<td><input type="text" name="subJob[' + i +
                        '][nationality]" readonly class="form-control" value = "' +
                        nationality +
                        ' " /></td>' +
                        '<td><button type="button" class="btn btn-outline-danger remove-edu-input-field">Delete</button></td></tr>'
                    );
                    $(document).on('click', '.remove-edu-input-field', function() {
                        $(this).parents('tr').remove();
                    });
                });
                makeInputsReadOnly();
            });

            function clearInputs(elements) {
                elements.forEach(element => {
                    element.setAttribute('readonly', '');
                });
            }

            function submitForm() {
                const cb = document.querySelector('#accept');
                if (cb.checked) {
                    demandForm = document.getElementById('my-form');
                    demandForm.submit();
                } else {
                    alert('You Have To Accept Terms & Conditions')
                }
            }
        </script>
        </div>

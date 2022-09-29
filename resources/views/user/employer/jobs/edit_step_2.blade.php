@extends('layouts.user.employer.master')
@section('title', 'ALSHOALA | ADD NEW JOB')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
@section('title', 'Dashboard | Create Demand')
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Post A New Job For Your Business</h1>
        <div class="row g-4">
            <div class="col-sm-12 text-center">
                @if (Session::has('error'))
                    <div class="alert alet-danger">{{ $request->session()->get('error') }}</div>
                @endif
                <form action="{{ route('jobs.edit.step-2', ['id' => $job]) }}" method="POST"
                    enctype="multipart/form-data" id="my-form" name="jobForm">
                    {{ csrf_field() }}
                    <div class="rounde  d h-100 p-4">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row rounded">
                                <div class="form-floating mb-3 col-sm-3">
                                    <select name="title" class="form-control" required>
                                        <option value="title">--- select one ---</option>
                                        @foreach ($titles as $title)
                                            <option value="{{ $title->id }}"
                                                @if (old('title') == $title) selected @endif>{{ $title->name }}
                                            </option>
                                        @endforeach
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




                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea required class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 150px;" required name="description">{{ old('description') }}</textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                    @error('description')
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
                                            @forelse($job->subJobs as $subJob)
                                                <tr>
                                                    <td>{{ $subJob->title->name }}</td>
                                                    <td>{{ $subJob->quantity }}</td>
                                                    <td>{{ $subJob->salary }}</td>
                                                    <td>{{ $subJob->nationality->name }}</td>
                                                    <td>{{ Str::limit($subJob->description, 35, '...') }}</td>
                                                    <td><button type="button"
                                                            class="btn btn-outline-danger remove-edu-input-field">Delete</button>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-desc={{ $subJob->description }}
                                                            class="btn btn-outline-primary" href="#descmodal"><i
                                                                class="fa fa-eye"></i> </a>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
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


                                <div class="col-sm-4"></div>
                                <button type="button" id="add-new-title" class="btn btn-info col-sm-3"><i
                                        class="fa fa-plus"></i> Add New</button>


                            </div>
                            <!-- Button trigger modal -->

                            {{-- <div class="container mt-3">
                                <div class="row">
                                    <div class="col-sm-4 text-left">
                                        <a href="#" id="back" class="btn btn-warning col-sm-3">
                                            <i class="fa fa-arrow-left"></i> Back
                                        </a>
                                    </div>
                                </div>
                            </div> --}}


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
            $('#back').on('click', function() {

                $.post("{{ route('creation-step-2') }}", {
                        data: JSON.stringify($('form').serialize()),
                    },
                    function(data, status) {
                        if (status == 'success') {
                            console.log(data);
                            window.location.href = "{{ route('setupJob') }}";
                        }
                    });
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
            makeInputsReadOnly();


        });

        function clearInputs(elements) {
            elements.forEach(element => {
                element.setAttribute('readonly', '');
            });
        }
    </script>
@endpush
@endsection

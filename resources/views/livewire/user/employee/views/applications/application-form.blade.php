@extends('layouts.user.employee.master')
@section('title', 'title')
@section('content')
    <div>
        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid  rounded"
                                src="{{ asset('assets/dist_3/assets/images/logo.png') }}" width="15%" alt="">

                            {{-- <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt=""
                            style="width: 80px; height: 80px;"> --}}
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{ $job->title->name }}</h3>
                                <span class="text-truncate me-0"><i class="fa fa-sun text-primary me-2"></i>
                                    {{ $job->status }}
                                </span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>
                                    {{ $job->salary }}
                                </span>
                                <span class="text-truncate me-0"><i class="fa fa-clock text-primary me-2"></i>
                                    {{ $job->contract_period }}
                                </span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="container">
                                <form action="{{ route('employee.application.create', $job->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        {{-- Basic Info --}}
                                        <div class="col-sm-4 mb-3">
                                            <h4>Reference:</h4>
                                            <input type="text" name="ref" class="form-control">
                                            @error('ref')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Date:</h4>
                                            <input type="date" name="date" class="form-control">
                                            @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Position Applied For:</h4>
                                            <select name="title" class="form-control">
                                                <option value="">-- select one -- </option>
                                                @foreach ($titles as $title)
                                                    <option value="{{ $title->id }}">{{ $title->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Full Name:</h4>
                                            <input type="text" name="full_name" class="form-control">
                                            @error('full_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>address:</h4>
                                            <input type="text" name="address" class="form-control">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Contact No:</h4>
                                            <input type="text" name="contact_no" class="form-control">
                                            @error('contact_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Passport No:</h4>
                                            <input type="text" name="passport_no" class="form-control">
                                            @error('passport_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Nationality:</h4>
                                            <select name="nationality" class="form-control">
                                                <option value="">-- select one -- </option>
                                                @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('nationality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Place Issued:</h4>
                                            <input type="text" name="place_issued" class="form-control">
                                            @error('place_issued')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>place Of Birth:</h4>
                                            <input type="text" name="place_of_birth" class="form-control">
                                            @error('place_of_birth')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>date_issued:</h4>
                                            <input type="date" name="date_issued" class="form-control">
                                            @error('date_issued')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Date Of Birth:</h4>
                                            <input type="date" name="date_of_birth" class="form-control">
                                            @error('date_of_birth')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Expiry Date:</h4>
                                            <input type="date" name="expiry_date" class="form-control">
                                            @error('expiry_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Age:</h4>
                                            <input type="text" name="age" class="form-control">
                                            @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <h4>Relegion:</h4>
                                            <input type="date" name="relegion" class="form-control">
                                            @error('relegion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>sex:</h4>
                                            <select name="sex" class="form-control">
                                                <option value="">-- select one --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('sex')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>children:</h4>
                                            <input type="text" name="children" class="form-control">
                                            @error('children')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>Height:</h4>
                                            <input type="text" name="height" class="form-control">
                                            @error('height')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>weight:</h4>
                                            <input type="text" name="weight" class="form-control">
                                            @error('height')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Arabic Language --}}
                                        <div class="col-sm-2 mb-3">
                                            <h4>Language:</h4>
                                            <input type="text" value="Arabic" readonly class="form-control">
                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <h4>Speak:</h4>
                                            <select name="arabic_speak" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('arabic_speak')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <h4>Understand:</h4>
                                            <select name="arabic_understand" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('arabic_understand')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>Read:</h4>
                                            <select name="arabic_read" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('arabic_read')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>Write:</h4>
                                            <select name="arabic_write" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('arabic_write')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- English Language --}}
                                        <div class="col-sm-2 mb-3">
                                            <h4>Language:</h4>
                                            <input type="text" value="English" readonly class="form-control">
                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <h4>Speak:</h4>
                                            <select name="english_speak" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('english_speak')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <h4>Understand:</h4>
                                            <select name="english_understand" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('english_understand')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>Read:</h4>
                                            <select name="english_read" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('english_read')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>Write:</h4>
                                            <select name="english_write" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('english_write')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Hindi Langauge --}}
                                        <div class="col-sm-2 mb-3">
                                            <h4>Language:</h4>
                                            <input type="text" value="Hindi" readonly class="form-control">
                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <h4>Speak:</h4>
                                            <select name="hindi_speak" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('hindi_speak')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <h4>Understand:</h4>
                                            <select name="hindi_understand" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('hindi_understand')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>Read:</h4>
                                            <select name="hindi_read" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('hindi_read')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <h4>Write:</h4>
                                            <select name="hindi_write" class="form-control">
                                                <option value="">-level-</option>
                                                <option value="excellent">Excellent</option>
                                                <option value="good">Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="poor">Poor</option>
                                            </select>
                                            @error('hindi_write')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <h4>Experince:</h4>
                                            <table class="table table-responsive" id="dynamicAddRemove">
                                                <tr>
                                                    <th>Employer</th>
                                                    <th>Duration</th>
                                                    <th>Country</th>
                                                    <th>Designation</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" required name="addMoreInputFields[0][employer]"
                                                            placeholder="Enter Empoloyer" class="form-control" />
                                                    </td>
                                                    <td><input type="text" required name="addMoreInputFields[0][duration]"
                                                            placeholder="Enter Duration" class="form-control" />
                                                    </td>
                                                    <td><input type="text" required name="addMoreInputFields[0][country]"
                                                            placeholder="Enter Country" class="form-control" />
                                                    </td>
                                                    <td><input type="text" required
                                                            name="addMoreInputFields[0][designation]"
                                                            placeholder="Enter Dseignation" class="form-control" />
                                                    </td>
                                                    <td><button type="button" name="add" id="dynamic-ar"
                                                            class="btn btn-outline-primary">Add</button></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <h4>Applicant Interviewed By: </h4>
                                            <input type="text" required class="form-control"
                                                name="applicant_interviewd_by">
                                            @error('applicant_interviewd_by')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <h4>Minumum Expected Salary: </h4>
                                            <input type="text" required class="form-control" name="min_salary">
                                            @error('min_salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <h4>Recommendations: </h4>
                                            <textarea name="recommendations" class="form-control" cols="30" rows="10"></textarea>
                                            @error('recommendations')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-3">
                                        <h4>Signutare:</h4>
                                        <input type="text" required class="form-control" name="signature">
                                        @error('signature')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button type="submit" onclick="myFunc()"
                                            class="btn btn-outline-success col-sm-12">SEND
                                            APPLICATION</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Published On:
                                {{ $job->created_at }}
                            </p>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Working Hours:
                                {{ $job->working_hours }}
                            </p>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Working Days:
                                {{ $job->working_days }}
                            </p>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Salary:
                                {{ $job->salary }}$
                            </p>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>OFF Day:
                                {{ $job->off_day }}</p>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Quantiy:
                                {{ $job->quantity }}</p>
                            </p>
                        </div>
                        {{-- <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">I&nbsp;&nbsp;psum dolor ipsum accusam stet et et diam dolores, sed rebum
                            sadipscing
                            elitr vero dolores.
                            Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est
                            ipsum lorem
                            diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->

        <!-- Button trigger modal -->


    </div>


@endsection
@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script> --}}
    <script>
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][employer]" placeholder="Enter Employer"  required class="form-control" /></td><td><input type="text" name="addMoreInputFields[' +
                i +
                '][duration]" placeholder="Enter Duration" required class="form-control" /></td><td><input type="text" name="addMoreInputFields[' +
                i +
                '][country]" placeholder="Enter Country" required class="form-control" /></td><td><input type="text" name="addMoreInputFields[' +
                i +
                '][designation]" placeholder="Enter Designation" required class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endpush

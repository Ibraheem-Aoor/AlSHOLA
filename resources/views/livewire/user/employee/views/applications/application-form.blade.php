@extends('layouts.user.employee.master')
@section('title', 'title')
<style>
    label,
    th {
        font-size: 0.7rem;
        font-weight: bolder;
    }

    .form-control {
        display: block !important;
        width: 90% !important;
        padding: 0.400rem 0.80rem !important;
        font-size: 0.6rem !important;
        font-weight: 400 !important;
        line-height: 1 !important;
        color: #666565 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #ced4da !important;
        appearance: none !important;
        border-radius: 2px !important;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
    }

    body {
        height: 30vh !important;
    }
</style>
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
                                {{-- <h3 class="mb-3">{{ $job->SubJobs->first()->title->name }}</h3> --}}
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
                                <form action="{{ route('employee.application.create', $job->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <table class="table table-responsive">
                                            <tr>
                                                <td>
                                                    {{-- Basic Info --}}
                                                    <div class=>
                                                        <label>Reference:</label>
                                                        <input required type="text" name="ref" class="form-control"
                                                            value="{{ $ref }}" readonly>
                                                        @error('ref')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class=>
                                                        <label>Date:</label>
                                                        <input readonly required type="text" name="date"
                                                            class="form-control" value="{{ Carbon\Carbon::now() }}">
                                                        @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class=>
                                                        <label>Position:</label>
                                                        <select required name="title" class="form-control">
                                                            <option value="">-- select one -- </option>
                                                            @foreach ($titles as $title)
                                                                <option value="{{ $title->id }}"
                                                                    @if (old('title') == $title->id) {{ 'selected' }} @endif>
                                                                    {{ $title->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class=>
                                                        <label>Full Name:</label>
                                                        <input required type="text" name="full_name" class="form-control"
                                                            value="{{ old('full_name') }}">
                                                        @error('full_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class=>
                                                        <label>Father Name:</label>
                                                        <input required type="text" name="father_name"
                                                            class="form-control" value="{{ old('father_name') }}">
                                                        @error('father_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <label>address:</label>
                                                        <input required type="text" name="address" class="form-control"
                                                            value="{{ old('address') }}">
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>


                                                <td>
                                                    <div>
                                                        <label>Contact No:</label>
                                                        <input required type="number" name="contact_no"
                                                            class="form-control" value="{{ old('contact_no') }}">
                                                        @error('contact_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>

                                                    <div>
                                                        <label>Passport No:</label>
                                                        <input required type="text" name="passport_no"
                                                            class="form-control" value="{{ old('passport_no') }}">
                                                        @error('passport_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Nationality:</label>
                                                        <select required name="nationality" class="form-control">
                                                            <option value="">-- select one -- </option>
                                                            @foreach ($nationalities as $nationality)
                                                                <option value="{{ $nationality->id }}"
                                                                    @if (old('nationality') == $nationality) {{ 'selected' }} @endif>
                                                                    {{ $nationality->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('nationality')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Place Issued:</label>
                                                        <input required type="text" name="place_issued"
                                                            class="form-control" value="{{ old('place_issued') }}">
                                                        @error('place_issued')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>date_issued:</label>
                                                        <input required type="date" name="date_issued"
                                                            class="form-control" value="{{ old('date_issued') }}">
                                                        @error('date_issued')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Date Of Birth:</label>
                                                        <input required type="date" name="date_of_birth"
                                                            class="form-control" value="{{ old('date_of_birth') }}">
                                                        @error('date_of_birth')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <div>
                                                        <label>Expiry Issued:</label>
                                                        <input required type="date" name="expiry_issued"
                                                            class="form-control" value="{{ old('expiry_issued') }}">
                                                        @error('expiry_issued')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Age:</label>
                                                        <input required type="number" name="age" class="form-control"
                                                            readonly value="{{ old('age') }}">
                                                        @error('age')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Relegion:</label>
                                                        <select name="relegion" class="form-control">
                                                            <option value="Muslim" @if(old('relegion')  == 'Muslim') selected @endif>Muslim</option>
                                                            <option value="Christian"  @if(old('relegion')  == 'Christian') selected @endif>Christian</option>
                                                            <option value="Hindu"  @if(old('relegion')  == 'Hindu') selected @endif>Hindu</option>
                                                            <option value="Buddhist"  @if(old('relegion')  == 'Buddhist') selected @endif>Buddhist</option>
                                                            <option value="other"  @if(old('relegion')  == 'other') selected @endif>other</option>
                                                        </select>
                                                        @error('relegion')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>sex:</label>
                                                        <select required name="sex" class="form-control">
                                                            <option value="">-- select one --</option>
                                                            <option value="male"
                                                                @if (old('sex') == 'male') {{ 'selected' }} @endif>
                                                                Male
                                                            </option>
                                                            <option value="female"
                                                                @if (old('sex') == 'female') {{ 'selected' }} @endif>
                                                                Female
                                                            </option>
                                                        </select>
                                                        @error('sex')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>children:</label>
                                                        <input required type="text" name="children" class="form-control"
                                                            value="{{ old('children') }}">
                                                        @error('children')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Height:</label>
                                                        <input required type="text" name="height" class="form-control"
                                                            value="{{ old('height') }}">
                                                        @error('height')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr>



                                            <tr>

                                                <td>
                                                    <div>
                                                        <label>weight:</label>
                                                        <input required type="text" name="weihgt" class="form-control"
                                                            value="{{ old('weihgt') }}">
                                                        @error('weihgt')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <label>place_of_birth:</label>
                                                        <input required type="text" name="place_of_birth"
                                                            class="form-control" value="{{ old('place_of_birth') }}">
                                                        @error('place_of_birth')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Employer Photo:</label>
                                                        <input type="file" class="form-control" name="photo" id="photo">
                                                        @error('weihgt')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- Arabic Language --}}
                                            <tr>
                                                <td>
                                                    <div>
                                                        <label>Language:</label>
                                                        <input required type="text" value="Arabic" readonly
                                                            class="form-control">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Speak:</label>
                                                        <select required name="arabic_speak" class="form-control">
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
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Understand:</label>
                                                        <select required name="arabic_understand" class="form-control">
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
                                                </td>
                                                <td>
                                                    <div>
                                                        <label>Read:</label>
                                                        <select required name="arabic_read" class="form-control">
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
                                                </td>
                                                <td>

                                                    <div>
                                                        <label>Write:</label>
                                                        <select required name="arabic_write" class="form-control">
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
                                                </td>
                                            </tr>



                                            {{-- English Language --}}
                                            <tr>
                                                <td>
                                                    <div>
                                                        <label>Language:</label>
                                                        <input required type="text" value="English" readonly
                                                            class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <label>Speak:</label>
                                                        <select required name="english_speak" class="form-control">
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
                                                </td>
                                                <td>

                                                    <div>
                                                        <label>Understand:</label>
                                                        <select required name="english_understand" class="form-control">
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
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Read:</label>
                                                        <select required name="english_read" class="form-control">
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
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Write:</label>
                                                        <select required name="english_write" class="form-control">
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
                                                </td>
                                            </tr>
                                            {{-- Hindi Langauge --}}

                                            <tr>
                                                <td>
                                                    <div>
                                                        <label>Language:</label>
                                                        <input required type="text" name="third_language"
                                                            class="form-control">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Speak:</label>
                                                        <select required name="hindi_speak" class="form-control">
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
                                                </td>
                                                <td>

                                                    <div>
                                                        <label>Understand:</label>
                                                        <select required name="hindi_understand" class="form-control">
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
                                                </td>
                                                <td>

                                                    <div>
                                                        <label>Read:</label>
                                                        <select required name="hindi_read" class="form-control">
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
                                                </td>
                                                <td>



                                                    <div>
                                                        <label>Write:</label>
                                                        <select required name="hindi_write" class="form-control">
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
                                                </td>
                                            </tr>
                                        </table>





                                        {{-- Language --}}
                                        <div class="col-sm-12 mt-2">
                                            <label>Education:</label>
                                            <table class="table table-responsive" id="dynamicAddRemoveEdu">
                                                <tr>
                                                    <th>Degree</th>
                                                    <th>Year</th>
                                                    <th>educational body</th>
                                                    <th>Country</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" required
                                                            name="addMoreEducationRecords[0][degree]"
                                                            placeholder="Enter Degree" class="form-control" />
                                                    </td>
                                                    <td><input type="text" required name="addMoreEducationRecords[0][year]"
                                                            placeholder="Enter Year" class="form-control" />
                                                    </td>
                                                    <td><input type="text" required
                                                            name="addMoreEducationRecords[0][country]"
                                                            placeholder="Enter education body" class="form-control" />
                                                    </td>
                                                    <td><input type="text" required name="addMoreEducationRecords[0][from]"
                                                            placeholder="Enter country" class="form-control" />
                                                    </td>
                                                    <td><button type="button" name="add" id="dynamic-edu-ar"
                                                            class="btn btn-outline-primary btn-sm">Add</button></td>
                                                </tr>
                                            </table>
                                            @error('addMoreEducationRecords')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        {{-- Experince --}}
                                        <div class="col-sm-12 mt-2">
                                            <label>Experince:</label>
                                            <table class="table table-responsive" id="dynamicAddRemove">
                                                <tr>
                                                    <th>Employer</th>
                                                    <th>Duration</th>
                                                    <th>Country</th>
                                                    <th>Designation</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" required name="addMoreInputFields[0][name]"
                                                            placeholder="Enter Employer" class="form-control" />
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
                                                            class="btn btn-outline-primary btn-sm">Add</button></td>
                                                </tr>
                                            </table>
                                            <div>
                                                @error('addMoreInputFields')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label>Applicant Interviewed By: </label>
                                            <input required type="text" required class="form-control"
                                                name="applicant_interviewd_by">
                                            @error('applicant_interviewd_by')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Minumum Expected Salary: </label>
                                            <input required type="number" required class="form-control"
                                                name="min_salary">
                                            @error('min_salary')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label>Recommendations: </label>
                                            <textarea name="recommendations" class="form-control" cols="30" rows="10"></textarea>
                                            @error('recommendations')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <span class="text-danger">Accepted File Types: pdf , jpg ,
                                                png</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Passport Attachment: </label>
                                            <input type="file" class="form-control" name="files['passport']" id="">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Medical Attachment: </label>
                                            <input type="file" class="form-control" name="files['medical']" id="">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Experince Attachment:</label>
                                            <input type="file" class="form-control" name="files['experince']" id="">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Eucation Attachment:</label>
                                            <input type="file" class="form-control" name="files['education']" id="">
                                        </div>
                                        <div>
                                            @error('files')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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
                            <label class="mb-4">Job Summery</label>
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
                                {{ $job->salary . ' ( ' . $job->currency . ' )' }}
                            </p>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>OFF Day:
                                {{ $job->off_day }}</p>
                            <p><i class="fa &nbsp;&nbsp;fa-angle-right text-primary me-2"></i>Quantiy:
                                {{ $job->quantity }}</p>
                            </p>
                        </div>
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
        let myDropzone = new Dropzone("#photo")
    </script>
    <script>
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][name]" placeholder="Enter name"  required class="form-control" /></td><td><input type="text" name="addMoreInputFields[' +
                i +
                '][duration]" placeholder="Enter Duration" required class="form-control" /></td><td><input type="text" name="addMoreInputFields[' +
                i +
                '][country]" placeholder="Enter Country" required class="form-control" /></td><td><input type="text" name="addMoreInputFields[' +
                i +
                '][designation]" placeholder="Enter Designation" required class="form-control" /></td><td><button type="button" class="btn btn-outline-danger btn-sm remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });


        $("#dynamic-edu-ar").click(function() {
            ++i;
            $("#dynamicAddRemoveEdu").append(
                '<tr><td><input type="text" name="addMoreEducationRecords[' + i +
                '][degree]" placeholder="Enter Degree"  required class="form-control" /></td><td><input type="text" name="addMoreEducationRecords[' +
                i +
                '][year]" placeholder="Enter Year" required class="form-control" /></td><td><input type="text" name="addMoreEducationRecords[' +
                i +
                '][from]" placeholder="Enter educational body" required class="form-control" /></td><td><input type="text" name="addMoreEducationRecords[' +
                i +
                '][country]" placeholder="Enter country" required class="form-control" /></td><td><button type="button" class="btn btn-outline-danger btn-sm remove-edu-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-edu-input-field', function() {
            $(this).parents('tr').remove();
        });





        $('input[name="date_of_birth"]').on('change', function() {
            var birthDate = $(this).val();
            var age = getAge(birthDate);
            $('input[name="age"]').val(age);
        });

        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }
    </script>
@endpush

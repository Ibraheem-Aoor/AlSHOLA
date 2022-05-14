@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Post A New Job For Your Business</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">

                    <div class="rounded h-100 p-4">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row rounded">
                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="email" class="form-control" name="title"
                                        placeholder="name@example.com" value="{{ $job->title->sector->name }}">
                                    <label for="floatingInput">&nbsp;&nbsp; Job Tilte</label>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="email" class="form-control" name="title"
                                        placeholder="name@example.com" value="{{ $job->title->name }}">
                                    <label for="floatingInput">&nbsp;&nbsp; Job Tilte</label>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="salary"
                                        value="{{ $job->nationality->name }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Nationality</label>
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="salary"
                                        value="{{ $job->salary }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="quantity"
                                        value="{{ $job->quantity }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Quantity</label>
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="contract_period"
                                        value="{{ $job->contract_period }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Contact Period</label>
                                    @error('contract_period')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="working_hours"
                                        value="{{ $job->working_hours }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Working Hours</label>
                                    @error('working_hours')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="working_days"
                                        value="{{ $job->working_days }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Working Days</label>
                                    @error('working_days')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="accommodation"
                                        value="{{ $job->accommodation }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; ACCOMMODATION</label>
                                    @error('accommodation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="transport"
                                        value="{{ $job->transport }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Transport</label>
                                    @error('transport')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="medical"
                                        value="{{ $job->medical }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; MEDICAL</label>
                                    @error('medical')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="insurance"
                                        value="{{ $job->insurance }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; INSURANCE</label>
                                    @error('insurance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="food"
                                        value="{{ $job->food }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; FOOD</label>
                                    @error('food')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="annual_leave"
                                        value="{{ $job->annual_leave }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; ANNUAL LEAVE</label>
                                    @error('annual_leave')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="air_ticket"
                                        value="{{ $job->air_ticket }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Air Ticket</label>
                                    @error('air_ticket')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="off_day"
                                        value="{{ $job->off_day }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Off Day</label>
                                    @error('off_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control"
                                        name="indemnity_leave_and_overtime_salary"
                                        value="{{ $job->indemnity_leave_and_overtime_salary }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; indemnity leave and overtime
                                        salary</label>
                                    @error('indemnity_leave_and_overtime_salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-4">
                                    <input readonly type="text" class="form-control" name="covid_test"
                                        value="{{ $job->covid_test }}">
                                    <label for="floatingPassword">&nbsp;&nbsp; Covid Test
                                    </label>
                                    @error('covid_test')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 150px;" name="other_terms">{{ $job->other_terms }}</textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Other Terms</label>
                                    @error('other_terms')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3 col-sm-12">
                                    <textarea readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 150px;" name="description">{{$job->description }}</textarea>
                                    <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating col-sm-12 mb-3 mr-auto">
                                    <a href="{{ route('job.edit', $job->id) }}"
                                        class="btn btn-primary col-sm-4 mr-auto">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

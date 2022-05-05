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
                    @if (Session::has('error'))
                        <div class="alert alet-danger">{{$request->session()->get('error')}}</div>
                    @endif
                    <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="rounded h-100 p-4">
                            <div class="container-fluid pt-4 px-4">
                                <div class="row rounded">
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input required type="text" class="form-control" name="title"
                                            placeholder="name@example.com" value="{{ old('title') }}">
                                        <label for="floatingInput">&nbsp;&nbsp; Job Tilte</label>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input required type="text" class="form-control" name="salary"
                                            value="{{ old('salary') }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                        @error('salary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input required type="text" class="form-control" name="location"
                                            value="{{ old('location') }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Location</label>
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input required type="text" class="form-control" id="floatingPassword"
                                            name="employer_website" value="{{ old('employer_website') }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Company Website</label>
                                        @error('employer_website')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input required type="text" class="form-control" id="floatingPassword"
                                            name="vacancy" value="{{ old('vacancy') }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; vacancy</label>
                                        @error('vacancy')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input required type="date" class="form-control" id="floatingPassword"
                                            name="end_date" value="{{ old('end_date') }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; End date</label>
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <select name="nature" id="" class="form-control">
                                            <option value="full time" selected>Full Time</option>
                                            <option value="part time">Part Time</option>
                                        </select>
                                        <label for="floatingPassword">&nbsp;&nbsp; Nature</label>
                                        @error('nature')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input required type="file" class="form-control"  name="attachments[]" multiple
                                            value="{{old('attachments')}}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Attachment</label>
                                        @error('attachments.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-12">
                                        <textarea required class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                            style="height: 150px;"
                                            name="description">{{ old('description') }}</textarea>
                                        <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating col-sm-12 mb-3">
                                        <textarea required class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                            style="height: 150px;"
                                            name="requirements">{{ old('requirements') }}</textarea>
                                        <label for="floatingTextarea">&nbsp;&nbsp; Job Requirements</label>
                                        @error('requirements')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating col-sm-12 mb-3">
                                        <textarea required class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                            style="height: 150px;"
                                            name="responsibilities">{{ old('responsibilities') }}</textarea>
                                        <label for="floatingTextarea">&nbsp;&nbsp; Job Responsebilites</label>
                                        @error('responsibilities')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
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
@endsection

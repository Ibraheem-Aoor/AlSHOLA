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
                    <form action="{{ route('job.update', $job->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="rounded h-100 p-4">
                            <div class="container-fluid pt-4 px-4">
                                <div class="row rounded">
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="text" class="form-control" name="title"
                                            placeholder="name@example.com" value="{{ $job->title }}">
                                        <label for="floatingInput">&nbsp;&nbsp; Job Tilte</label>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="text" class="form-control" name="salary"
                                            value="{{ $job->salary }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                        @error('salary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="text" class="form-control" name="location"
                                            value="{{ $job->location }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Location</label>
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="text" class="form-control" id="floatingPassword"
                                            name="employer_website" value="{{ $job->employer_website }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Company Website</label>
                                        @error('employer_website')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="text" class="form-control" name="end_date"
                                            value="{{ $job->end_date }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; End_Date</label>
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="text" class="form-control" name="vacancy"
                                            value="{{ $job->vacancy }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Vacancy</label>
                                        @error('vacancy')
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
                                        @forelse($job->attachments as $attachment)
                                            {{$attachment->name}}
                                        @empty
                                        <span class="text-danger">No Attachments Yet!</span>
                                        @endforelse
                                    </div>

                                    <div class="form-floating mb-3 col-sm-12">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                                            name="description">{{ $job->description }}</textarea>
                                        <label for="floatingTextarea">&nbsp;&nbsp; Job Description</label>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating col-sm-12 mb-3">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                                            name="requirements">{{ $job->requirements }}</textarea>
                                        <label for="floatingTextarea">&nbsp;&nbsp; Job Requirements</label>
                                        @error('requirements')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating col-sm-12 mb-3">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                                            name="responsibilities">{{ $job->responsibilities }}</textarea>
                                        <label for="floatingTextarea">&nbsp;&nbsp; Job Responsebilites</label>
                                        @error('responsibilities')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating col-sm-12 mb-3 mr-auto">
                                        <button type="submit" class="btn btn-primary col-sm-4 mr-auto">SAVE</button>
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

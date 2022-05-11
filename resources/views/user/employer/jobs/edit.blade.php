@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Edit Job Post</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <form action="{{ route('job.update', $job->id) }}" method="POST" enctype="multipart/form-data"
                        name="jobForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="rounded h-100 p-4">
                            <div class="container-fluid pt-4 px-4">
                                <div class="row rounded">

                                    <div class="form-floating mb-3 col-sm-6">
                                        <select name="sector" class="form-control">
                                            @if ($job->title->sector)
                                                <option value="{{ $job->title->sector->id }}" selected>
                                                    {{ $job->title->sector->name }}</option>
                                            @endif
                                            <option value="">--- select one ---</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}"
                                                    @if (old('sector') == $sector->id) {{ 'selected' }} @endif>
                                                    {{ $sector->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingInput">&nbsp;&nbsp; Job Sector</label>
                                        @error('sector')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3 col-sm-6">
                                        <select name="title" class="form-control">
                                            @if ($job->title)
                                                <option value="{{ $job->title->id }}" selected>
                                                    {{ $job->title->name }}
                                                </option>
                                            @endif
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

                                    <div class="form-floating mb-3 col-sm-6">
                                        <select name="nationality" class="form-control">
                                            @if ($job->nationality)
                                                <option value="{{ $job->nationality->id }}" selected>
                                                    {{ $job->nationality->name }}</option>
                                            @endif
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
                                        <input type="text" class="form-control" name="salary"
                                            value="{{ $job->salary }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Salary</label>
                                        @error('salary')
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

                                    <div class="form-floating mb-3 col-sm-12">
                                        <input type="text" class="form-control" name="end_date"
                                            value="{{ $job->end_date }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; End_Date</label>
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="file" class="form-control" name="attachments[]" multiple
                                            class="dropzone" value="{{ old('attachments') }}">
                                        <label for="floatingPassword">&nbsp;&nbsp; Attachment</label>
                                        @error('attachments.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3 col-sm-6" id="fileTypeDiv">
                                        <select name="file_type" class="form-control">
                                            @foreach ($fileTypes as $type)
                                                <option value="{{ $type->name }}"
                                                    @if (old('file_type') == $type->id) {{ 'selected' }} @endif>
                                                    {{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingPassword">&nbsp;&nbsp; File Type</label>
                                        @error('file_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                    @if ($job->responsibilities)
                                        <div class="form-floating col-sm-12 mb-3">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                                                name="responsibilities">{{ $job->responsibilities }}</textarea>
                                            <label for="floatingTextarea">&nbsp;&nbsp; Job Responsebilites</label>
                                            @error('responsibilities')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="form-floating mb-3 col-sm-6">
                                        <input type="file" name="responsibilites_file" class="form-control">
                                        <label for="floatingPassword">Responsibilities File</label>
                                        <p class="text-info">attach file instead of write the Responsebilites</p> <br>
                                        @error('responsibilites_file')
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

@push('js')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
    $(document).ready(function() {
        $('#fileTypeDiv').hide();
        $('input[name="attachments[]"]').on('change', function() {
            var file = document.forms['jobForm']['attachments[]'].files[0];
            if (file != null)
                $('#fileTypeDiv').show();
        })
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

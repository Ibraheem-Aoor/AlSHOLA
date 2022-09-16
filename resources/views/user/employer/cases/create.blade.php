@extends('layouts.user.employer.master')
@section('title', 'Dashboard | NEW CASE')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">SEND NEW CASE</h1>
            <form action="{{ route('cases.store') }}" method="POST" enctype="multipart/form-data" id="caseForm">
                @csrf
                <div class="row g-4">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <label for="">Choose Candidate</label>
                        <select name="application_id" class="form-control text-center"
                            data-route="{{ route('employer.case.get_application') }}">
                            <option value="">-- Select One -- </option>
                            @forelse ($applications as $application)
                                <option value="{{ $application->id }}">{{ $application->full_name }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('application_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="">Reason</label>
                        <select name="reason" class="form-control">
                            <option value="">--select one--</option>
                            <option value="Homesick">Homesick</option>
                            <option value="Medically unfit">Medically unfit</option>
                            <option value="Professionally unfit">Professionally unfit</option>
                            <option value="other">Other</option>
                        </select>
                        @error('reason')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-3 mt-3"></div>
                    <div class="col-sm-6" id="other_reason">
                        <label for="">Write The Reason: </label>
                        <textarea name="other_reason" class="form-control" autofocus="false" style="height: 130px;"></textarea>
                    </div>
                    <div class="col-sm-12"></div>
                    <div class="col-sm-6">
                        <label for="">Contact Number:</label>
                        <input type="text" name="contact_number" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Attachment:</label>
                        <input type="file" name="attachments[]" multiple class="form-control">
                        @error('attachments')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-outline-success col-sm-12" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="row g-4 mt-2" id="application_details">

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $('#other_reason').hide();
                $('select[name="reason"]').on('change', function() {
                    // alert('testing');
                    var reason = $(this).val();
                    if (reason == 'other') {
                        $('#other_reason').show();
                        $('textarea[name="other_reason"]').attr('required', 'required');
                    } else {
                        $('textarea[name="other_reason"]').removeAttr('required');
                        $('#other_reason').hide();
                    }
                });



                $('select[name="application_id"]').on('change', function() {
                    $.ajax({
                        headers: {}
                    });
                });


            });
        </script>
    @endpush


</div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/custom/employer/case.js') }}"></script>
@endpush

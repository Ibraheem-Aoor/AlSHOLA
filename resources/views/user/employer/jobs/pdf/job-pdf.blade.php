<!-- Job Detail Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">

            <div class="mb-5">
                <h1 class="mb-3 text-center">Job Documentation:</h1>
                    <h4 class="mb-3" style="color:red">Title:</h4>
                    <p style="font-weight: 600; "> {{ $job->title }}</p>
                    <h4 class="mb-3" style="color:red">Location:</h4>
                    <p style="font-weight: 600; ">{{ $job->location }}</p>
                    <h4 class="mb-3" style="color:red">Nature:</h4>
                    <p style="font-weight: 600; ">{{ $job->nature }}</p>
                    <h4 class="mb-3" style="color:red">Salary:</h4>
                    <p style="font-weight: 600; ">{{ $job->salary }}</p>


            </div>

            <div class="mb-5">
                <h4 class="mb-3" style="color:red">Job description:</h4>
                <p>{{ $job->descreption }}</p>
                <h4 class="mb-3" style="color:red">Responsibility:</h4>
                <p>{{ $job->responsibilities }}</p>
                <h4 class="mb-3" style="color:red">Qualifications:</h4>
                <p>{{ $job->requirements }}</p>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                <h4 class="mb-4" style="color:red">Job Summery:</h4>
                <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $job->created_at }}</p>
                <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $job->vacancy }} Position
                </p>
                <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $job->nature }}</p>
                <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $job->salary }}</p>
                <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $job->location }}</p>
                <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line:
                    {{ $job->end_date }}
                </p>
            </div>
            <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                <h4 class="mb-4" style="color:red">Company Detail:</h4>
                <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum
                    sadipscing
                    elitr vero dolores.
                    Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est
                    ipsum lorem
                    diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Job Detail End -->






</div>

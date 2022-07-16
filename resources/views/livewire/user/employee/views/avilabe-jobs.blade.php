<div>
    @section('title', 'ALSHOALA | AVILABLE JOBS')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Avilable Jobs Recommended For You</h1>
            <div class="row g-4">
                <div class="col-sm-4">
                    <select name="filter" class="form-control text-center">
                        <option value="">-- Select One -- </option>
                        <option value="Demand Complete">Completed</option>
                        <option value="Demand Cancelled">Cancelled</option>
                        <option value="Demand Under Proccess">Under Proccess</option>
                        <option value="Demand Submitted">Submited</option>
                    </select>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="{{ route('agent-job.search') }}" method="GET">
                        @csrf
                        <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                            aria-label="Search" name="search">
                    </form>
                </div>
                <div class="col-sm-12 text-center">
                    <div class="table-responsive" id="avilable-jobs_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">DSR</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Supply</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Creation_date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($avlialbeJobs as $job)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $job->post_number }}</td>
                                        <td>{{ $job->qty() }}</td>
                                        <td>
                                            {{ $job->applications->count() }}
                                        </td>

                                        <td>
                                            {{ $job->qty() - $job->applications->count() }}
                                        </td>

                                        <td>
                                            {{ $job->user->name }}
                                        </td>
                                        <td>{{ $job->created_at }}</td>
                                        <td>{{ $job->subStatus->name }}</td>
                                        @if ($job->subStatus->name != 'Demand Cancelled' && $job->subStatus->name != 'Demand Complete')
                                            <td>
                                                <a href="{{ route('employee.job.details', $job->id) }}"
                                                    class=" btn btn-outline-primary" href="#"><i
                                                        class="fa fa-eye"></i>
                                                    Details</a>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="alert alert-warning text-center bg-dark"
                                            style="color:#fff">
                                            No Records Yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $avlialbeJobs->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('select[name="filter"]').on('change', function() {
                // alert('testing');
                var status = $(this).val();
                if (status) {
                    $.ajax({
                        url: "{{ URL::to('avilable_job/filter') }}/" + status,
                        type: "GET",
                        // dataType: "json",
                        success: function(data) {
                            $('#avilable-jobs_table').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endpush

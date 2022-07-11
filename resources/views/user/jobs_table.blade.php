<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">DSR</th>
            <th scope="col">Total</th>
            <th scope="col">Supply</th>
            <th scope="col">Balance</th>
            <th scope="col">Applications</th>
            <th scope="col">Creation_date</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @forelse ($jobs as $job)
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
                    <a href="{{ route('employer.job.applications.all', $job->id) }}">
                        {{ $job->applications_count }}
                    </a>
                </td>
                <td>{{ $job->created_at }}</td>
                <td>{{ $job->subStatus->name }}</td>

                <td>
                    <a title="Details" href="{{ route('job.show', $job->id) }}"><i class="fa fa-eye"></i></a>

                    {{-- <a href="{{ route('job.pdf.generate', $job->id) }}"><i
                            class="fa fa-print"></i>
                        </a> --}}


                    <a href="#exampleModal_5" data-toggle="modal" title="upload attachment"
                        data-number="{{ $job->post_number }}" data-id="{{ $job->id }}"><i
                            class="fa fa-upload"></i>
                    </a>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="alert alert-warning text-center bg-dark" style="color:#fff">
                    No Records Yet
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Demand No</th>
            <th scope="col">Ref</th>
            <th scope="col">Full Name</th>
            <th scope="col">Passport</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Attachments</th>
            <th scope="col">Applied At</th>
            <th scope="col">Actions</th>
            {{-- <th scope="col">Actions</th> --}}
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
            $title = [];
            $file_type = [];
        @endphp
        @forelse ($applications as $application)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $application->job->post_number }}</td>
                <td>{{ $application->ref }}</td>
                <td>{{ $application->full_name }}</td>
                <td>{{ $application->passport_no }}</td>
                <td>{{ $application->title->name }}</td>
                <td>{{ $application->subStatus->name }}</td>
                <td><a
                        href="{{ route('employer.application.attachments', $application->id) }}">{{ $application->attachments_count }}</a>
                </td>
                <td>{{ $\Carbon\Carbon::parse($application->created_at)->format('Y-M-d')</td>
                @if ($application->subStatus->name != 'Cancelled Application' && $application->job->subStatus->name != 'Demand Cancelled')
                    <td>
                        <a href="{{ route('employer.application.details', $application->id) }}"
                            class="badge bg-warning" title="show details">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('employer.application.pdf.generate', $application->id) }}"
                            class="badge bg-success" title="print application"><i class="fa fa-print"></i></a>

                        @switch($application->job->subStatus->name)
                            @case('Demand Under Proccess')
                                @php
                                    $title[$i] = 'Upload File';
                                    $file_type[$i] = 'asdasd';
                                @endphp
                            @break

                            @php
                                $title[$i] = null;
                                $file_type[$i] = null;
                            @endphp
                        @endswitch

                        @isset($file_type[$i])
                            <a data-toggle="modal" data-id="{{ $application->id }}" href="#exampleModal_5">
                                <i class="fa fa-upload"></i>
                            </a>
                        @endisset
                    </td>
                @endif

            </tr>
        @empty
            <tr>
                <td colspan="10" class="alert alert-warning text-center bg-dark" style="color:#fff">
                    No Records Yet
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

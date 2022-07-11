<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Demand No</th>
            <th scope="col">Ref</th>
            <th scope="col">Full Name</th>
            <th scope="col">Passport</th>
            <th scope="col">Client_Name</th>
            <th scope="col">Number_Of_Notes</th>
            <th scope="col">Status</th>
            <th scope="col">Applied At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $title = [];
            $file_type = [];
        @endphp
        @php
            $i = 1;
        @endphp
        @forelse ($applications as $application)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $application->job->post_number }}</td>
                <td>{{ $application->ref }}</td>
                <td>{{ $application->full_name }}</td>
                <td>{{ $application->passport_no }}</td>
                <td>{{ $application->job->user->name }}</td>
                <td><a
                        href="{{ route('employee.application.notes', $application->id) }}">{{ $application->notes_count }}</a>
                </td>
                <td>{{ $application->subStatus->name }}</td>
                <td>{{ $application->created_at }}</td>
                @if ($application->subStatus->name != 'Cancelled Application' && $application->job->subStatus->name != 'Demand Cancelled')
                    <td>
                        @switch($application->job->subStatus->name)
                            @case('Demand Under Proccess')
                                @php
                                    $title[$i] = 'Upload Medical/Agreement File(s)';
                                    $file_type[$i] = 'medical/agreement';
                                @endphp
                            @break

                            @default
                                @php
                                    $title[$i] = null;
                                    $file_type[$i] = null;
                                @endphp
                        @endswitch
                        <a href="{{ route('employeee.application.details', $application->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        @isset($file_type[$i])
                            <a href="#exampleModal_5" data-title="{{ $title[$i] }}"
                                data-toggle="modal" data-type="{{ $file_type[$i] }}"
                                data-id="{{ $application->id }}">
                                <i class="fa fa-upload"></i>
                            </a>
                        @endisset
                    </td>
                @endif
            </tr>
            @empty
                <tr>
                    <td colspan="10" class="alert alert-warning text-center bg-dark"
                        style="color:#fff">
                        No Records Yet
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

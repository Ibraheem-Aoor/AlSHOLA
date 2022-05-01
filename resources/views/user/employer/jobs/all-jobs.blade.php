@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Add New Jobs')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            @switch(Route::currentRouteName())
                @case('employer.jobs.index')
                    @php
                        $title = 'All';
                    @endphp
                @break

                @case('employer.jobs.pending')
                    @php
                        $title = 'Pending';
                    @endphp
                @break

                @case('employer.jobs.active')
                    @php
                        $title = 'Active';
                    @endphp
                @break

                @case('employer.jobs.Completed')
                    @php
                        $title = 'Completed';
                    @endphp
                @break

                @case('employer.jobs.cancelled')
                    @php
                        $title = 'Cancelled';
                    @endphp
                @break

                @case('employer.jobs.returned')
                    @php
                        $title = 'Returned';
                    @endphp
                @break

                @default
            @endswitch
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">{{ $title }} Job Posts</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Location</th>
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
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $job->status }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a href="{{ route('job.show', $job->id) }}"
                                                            class="dropdown-item badge bg-primary" href="#">Details</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('job.destroy', $job) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="dropdown-item badge bg-danger"><i
                                                                    class="fa fa-trash"></i> Delete</button>
                                                        </form>
                                                    </li>
                                                    @if ($title = 'Returned')
                                                        <li><a class="dropdown-item badge bg-info"
                                                                href="{{ route('employer.job.notes', $job->id) }}"><i
                                                                    class="fa fa-eye"></i> Show Notes</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-warning text-center bg-dark"
                                            style="color:#fff">
                                            No Records Yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection

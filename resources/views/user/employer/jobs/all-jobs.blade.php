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
                @case('employer.job.all')
                    @php
                        $title = 'All';
                    @endphp
                @break

                @case('employer.job.pending')
                    @php
                        $title = 'Pending';
                    @endphp
                @break

                @case('employer.job.active')
                    @php
                        $title = 'Active';
                    @endphp
                @break

                @case('employer.job.Completed')
                    @php
                        $title = 'Completed';
                    @endphp
                @break

                @case('employer.job.cancelled')
                    @php
                        $title = 'Cancelled';
                    @endphp
                @break

                @default
            @endswitch
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">{{$title}} Job Posts</h1>
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
                                        <td><a href="{{ route('job.show', $job->id) }}"
                                                class="btn btn-info">Details</a></td>
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
@endsection

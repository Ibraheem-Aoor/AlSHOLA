@extends('layouts.user.employee.master')
@section('title', 'ALSHOLA | AVILABLE JOBS')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Applications You have submited</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Job_Number</th>
                                    <th scope="col">Job_Title</th>
                                    <th scope="col">Number_Of_Notes</th>
                                    <th scope="col">Applied At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($applications as $application)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $application->job->post_number }}</td>
                                        <td>{{ $application->job->title }}</td>
                                        <td><a
                                                href="{{ route('employee.application.notes', $application->id) }}">{{ $application->notes_count }}</a>
                                        </td>
                                        <td>{{ $application->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-warning text-center bg-dark" style="color:#fff">
                                            No Records Yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

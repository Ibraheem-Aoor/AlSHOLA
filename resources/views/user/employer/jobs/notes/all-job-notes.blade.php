@extends('layouts.user.employer.master')
@section('title', 'Dashboard | Job Notes')
@section('content')
    <div>
    @section('title', 'Dashboard | Create Job Post')
    <div class="container-xxl py-5">
        <div class="container">

            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Notes</h1>
            <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Title: {{ $job->title }}</h1>
            <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Status: {{ $job->status }}</h1>
                <div class="row g-4">
                    <div class="col-sm-12 text-center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">send_date</th>
                                        <th scope="col">message</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($job->notes as $note)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $note->created_at }}</td>
                                            <td>{{ Str::limit($note->message, 50, '...') }}</td>
                                            <td>
                                                <button class="btn btn-outline-success"><i class="fa fa-eye"></i> &nbsp;  Show</button>
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
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

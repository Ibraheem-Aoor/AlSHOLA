@extends('layouts.user.employee.master')
@section('title', 'ALSHOALA | AVILABLE JOBS')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $title = '';
            @endphp
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Avilable Users</h1>
            <div class="row g-4">
                <div class="col-sm-12 text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <form action="{{ route('employee.candidacy.order.create', $jobId) }}" method="POST">
                                @csrf
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">#</th>
                                        <th scope="col">User_Name</th>
                                        <th scope="col">Join_Date</th>
                                        <th scope="col">
                                            <button type="submit" class="btn btn-outline-success">Recommend Selected</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($users as $user)
                                        <tr>
                                            @if ($user->id == Auth::id())
                                                @continue
                                            @endif
                                            <th scope="row"><input type="checkbox" name="users[]"
                                                    value="{{ $user->id }}">
                                            </th>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="alert alert-warning text-center bg-dark"
                                                style="color:#fff">
                                                No Records Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </form>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>


            {{-- Accept The Offer --}}
            <!-- Modal -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal_5" tabindex="-1" wire:ignore aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload MEDICAL FILE:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('application.file.upload') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-sm-6">
                                    <label for="" style="font-weight: 600">MEDICAL FILE:</label>
                                    &nbsp; &nbsp; <input type="file" required name="file">
                                    &nbsp; &nbsp; <input type="text" id="id" name="id" hidden>
                                </div>
                                <div class="form-group col-sm-6 text-center" style="width: 100%">
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-upload"></i>
                                        UPLOAD</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            @push('js')
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                                crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                                crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

                <script>
                    $('#exampleModal_5').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var id = button.data('id')
                        var modal = $(this)
                        modal.find('.modal-body #id').val(id);
                    })
                </script>
            @endpush
        </div>
    </div>
@endsection
